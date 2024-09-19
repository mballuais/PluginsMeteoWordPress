<?php
/*
Plugin Name: Plugin Météo
Description: Le meilleur Widget de France (objectivement parlant)
Version: 1.0
Author: Matteo
*/

function plugin_meteo_add_admin_menu() {
    add_options_page(
        'Paramètres du Plugin Météo',
        'Plugin Météo',
        'manage_options',
        'plugin-meteo',
        'plugin_meteo_options_page'
    );
}
add_action('admin_menu', 'plugin_meteo_add_admin_menu');

function plugin_meteo_settings_init() {
    register_setting('plugin_meteo_settings', 'plugin_meteo_options');

    add_settings_section(
        'plugin_meteo_section',
        __('Paramètres du Plugin Météo', 'plugin-meteo'),
        'plugin_meteo_settings_section_callback',
        'plugin_meteo_settings'
    );

    add_settings_field(
        'plugin_meteo_default_city',
        __('Ville par défaut', 'plugin-meteo'),
        'plugin_meteo_default_city_render',
        'plugin_meteo_settings',
        'plugin_meteo_section'
    );

    add_settings_field(
        'plugin_meteo_display_temperature',
        __('Afficher la température', 'plugin-meteo'),
        'plugin_meteo_display_temperature_render',
        'plugin_meteo_settings',
        'plugin_meteo_section'
    );

    add_settings_field(
        'plugin_meteo_display_description',
        __('Afficher la description', 'plugin-meteo'),
        'plugin_meteo_display_description_render',
        'plugin_meteo_settings',
        'plugin_meteo_section'
    );

    add_settings_field(
        'plugin_meteo_display_humidity',
        __('Afficher l\'humidité', 'plugin-meteo'),
        'plugin_meteo_display_humidity_render',
        'plugin_meteo_settings',
        'plugin_meteo_section'
    );

    add_settings_field(
        'plugin_meteo_display_wind',
        __('Afficher la vitesse du vent', 'plugin-meteo'),
        'plugin_meteo_display_wind_render',
        'plugin_meteo_settings',
        'plugin_meteo_section'
    );
}
add_action('admin_init', 'plugin_meteo_settings_init');

function plugin_meteo_default_city_render() {
    $options = get_option('plugin_meteo_options');
    ?>
    <input type='text' name='plugin_meteo_options[default_city]' value='<?php echo isset($options['default_city']) ? esc_attr($options['default_city']) : 'Paris'; ?>'>
    <?php
}

function plugin_meteo_display_temperature_render() {
    $options = get_option('plugin_meteo_options');
    ?>
    <input type='checkbox' name='plugin_meteo_options[display_temperature]' <?php checked(isset($options['display_temperature']) ? $options['display_temperature'] : 0, 1); ?> value='1'>
    <?php
}

function plugin_meteo_display_description_render() {
    $options = get_option('plugin_meteo_options');
    ?>
    <input type='checkbox' name='plugin_meteo_options[display_description]' <?php checked(isset($options['display_description']) ? $options['display_description'] : 0, 1); ?> value='1'>
    <?php
}

function plugin_meteo_display_humidity_render() {
    $options = get_option('plugin_meteo_options');
    ?>
    <input type='checkbox' name='plugin_meteo_options[display_humidity]' <?php checked(isset($options['display_humidity']) ? $options['display_humidity'] : 0, 1); ?> value='1'>
    <?php
}

function plugin_meteo_display_wind_render() {
    $options = get_option('plugin_meteo_options');
    ?>
    <input type='checkbox' name='plugin_meteo_options[display_wind]' <?php checked(isset($options['display_wind']) ? $options['display_wind'] : 0, 1); ?> value='1'>
    <?php
}

function plugin_meteo_settings_section_callback() {
    echo __('Configurer les paramètres du Plugin Météo.', 'plugin-meteo');
}
  
function plugin_meteo_options_page() {
    ?>
    <form action='options.php' method='post'>
        <h1>Plugin Météo</h1>
        <?php
        settings_fields('plugin_meteo_settings');
        do_settings_sections('plugin_meteo_settings');
        submit_button();
        ?>
    </form>
    <?php
}

function get_weather_donne($city = 'Paris') {
    $api_key = 'ac74dab4c2ae2f6d02ed66de07cc0c28';
    $api_url = "http://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$api_key}&units=metric&lang=fr";

    $response = wp_remote_get($api_url);

    if (is_wp_error($response)) {
        return 'Erreur : Impossible de récupérer les données météo';
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);

    if ((string)$data['cod'] !== '200') {
        return 'Erreur : Ville non trouvée';
    }

    return $data;
}

function render_meteo_block($attributes) {
    $options = get_option('plugin_meteo_options');

    $default_city = isset($options['default_city']) ? sanitize_text_field($options['default_city']) : 'Paris';

    $display_temperature = isset($options['display_temperature']) ? $options['display_temperature'] : 0;
    $display_description = isset($options['display_description']) ? $options['display_description'] : 0;
    $display_humidity    = isset($options['display_humidity']) ? $options['display_humidity'] : 0;
    $display_wind        = isset($options['display_wind']) ? $options['display_wind'] : 0;

    if (isset($_POST['meteo_city'])) {
        $city = sanitize_text_field($_POST['meteo_city']);
    } else {
        $city = $default_city;
    }

    $form = '<form method="post">
                <label for="meteo_city">Entrez une ville :</label>
                <input type="text" id="meteo_city" name="meteo_city" placeholder="Ville" required>
                <button type="submit">Voir la météo</button>
            </form>';

    $weather_data = get_weather_donne($city);

    if (is_string($weather_data)) {
        $output = '<p>' . esc_html($weather_data) . '</p>';
    } else {
        $city_name = $weather_data['name'];
        $country_code = $weather_data['sys']['country'];
        $output = '<h3>Météo à ' . esc_html($city_name) . ', ' . esc_html($country_code) . '</h3>';

        if ($display_temperature) {
            $temperature = $weather_data['main']['temp'];
            $output .= '<p>Température : ' . esc_html($temperature) . '°C</p>';
        }

        if ($display_description) {
            $description = $weather_data['weather'][0]['description'];
            $output .= '<p>Description : ' . esc_html($description) . '</p>';
        }

        if ($display_humidity) {
            $humidity = $weather_data['main']['humidity'];
            $output .= '<p>Humidité : ' . esc_html($humidity) . '%</p>';
        }

        if ($display_wind) {
            $wind_speed = $weather_data['wind']['speed'];
            $output .= '<p>Vitesse du vent : ' . esc_html($wind_speed) . ' m/s</p>';
        }
    }

    return $form . $output;
}

function plugin_meteo_block_init() {
    wp_register_script(
        'plugin-meteo-block-editor',
        plugins_url('block.js', __FILE__),
        array('wp-blocks', 'wp-element', 'wp-editor'),
        filemtime(plugin_dir_path(__FILE__) . 'block.js')
    );

    register_block_type('plugin-meteo/meteo', array(
        'editor_script' => 'plugin-meteo-block-editor',
        'render_callback' => 'render_meteo_block',
    ));
}
add_action('init', 'plugin_meteo_block_init');

function plugin_meteo_add_settings_link($links) {
    $settings_link = '<a href="options-general.php?page=plugin-meteo">' . __('Paramètres', 'plugin-meteo') . '</a>';
    array_unshift($links, $settings_link);
    return $links;
}
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'plugin_meteo_add_settings_link');
