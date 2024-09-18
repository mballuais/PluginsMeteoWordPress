<?php
/*
Plugin Name: Plugin Météo
Description: Le meuilleur Widget de France (objectivment parlant)
Version: 1.0
Author: Matteo
*/

function get_weather_donne($city = 'Paris') {
    $api_key = 'ac74dab4c2ae2f6d02ed66de07cc0c28'; 
    $api_url = "http://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$api_key}&units=metric&lang=fr";

    $response = wp_remote_get($api_url);

    if (is_wp_error($response)) {
        return 'Erreur : Impossible de récupérer les données météo';
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);

    if ($data['cod'] != 200) {
        return 'Erreur : Ville non trouvée';
    }

    return $data;
}

function render_meteo_block($attributes) {
    if (isset($_POST['meteo_city'])) {
        $city = sanitize_text_field($_POST['meteo_city']);
    } else {
        $city = 'Paris';
    }

    $form = '<form method="post">
                <label for="meteo_city">Entrez une ville :</label>
                <input type="text" id="meteo_city" name="meteo_city" placeholder="Ville" required>
                <button type="submit">Voir la météo</button>
            </form>';

    $weather_data = get_weather_donne($city);

    if (is_string($weather_data)) {
        $output = "<p>$weather_data</p>";
    } else {
        // Affichage des données météo
        $temperature = $weather_data['main']['temp'];
        $description = $weather_data['weather'][0]['description'];
        $humidite = $weather_data['main']['humidity'];
        $vent = $weather_data['wind']['speed'];

        // Génération du code HTML à afficher
        $output = "
        <h3>Météo à {$city}</h3>
        <p>Température : {$temperature}°C</p>
        <p>Description : {$description}</p>
        <p>Humidité : {$humidite}%</p>
        <p>Vitesse du vent : {$vent} m/s</p>
        ";
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
