<?php
/*
Plugin Name: Plugin Météo
Description: Affiche la météo actuelle à l'aide de l'API OpenWeatherMap.
Version: 1.0
Author: Matteo
*/

function get_weather_donne($city = 'Paris') {
    $api_key = 'ac74dab4c2ae2f6d02ed66de07cc0c28'; // Remplace TA_CLE_API par ta vraie clé API.
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
