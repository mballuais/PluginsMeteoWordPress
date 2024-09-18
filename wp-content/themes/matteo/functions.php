
<?php

function theme_ajouter_widgets_support() {
    add_theme_support('widgets');
}
add_action('after_setup_theme', 'theme_ajouter_widgets_support');