<?php
/*
Plugin Name: Plugin Météo
Description: Affiche la météo actuelle à l'aide de l'API OpenWeatherMap.
Version: 1.0
Author: Ton Nom
*/

function afficher_meteo($atts) {
    // Récupère la ville depuis les attributs ou utilise la ville par défaut
    $atts = shortcode_atts(
        array(
            'ville' => 'Paris', // Ville par défaut
        ),
        $atts,
        'meteo'
    );

    // Clé API OpenWeatherMap
    $api_key = 'ac74dab4c2ae2f6d02ed66de07cc0c28'; // Remplace par ta clé API
    $ville = sanitize_text_field($atts['ville']);
    $url = `https://api.openweathermap.org/data/2.5/weather?q=${cityName}&appid=${apiKey}&units=metric&lang=fr`;

}