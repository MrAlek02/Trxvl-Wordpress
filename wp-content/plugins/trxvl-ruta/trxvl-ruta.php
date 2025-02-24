<?php
/*
* Plugin Name: Trxvl Ruta
* Description: plugin za otvaranje sajta REST API.
* Version: 1.0
* Author: Aleksandar
*/

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

add_action('plugins_loaded', function () {

    require_once 'inc/functions/index.php';

    add_action('rest_api_init', 'prefix_register_example_routes');
});
