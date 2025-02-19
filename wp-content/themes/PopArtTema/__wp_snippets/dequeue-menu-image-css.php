<?php

/* Dequeue menu-image.css */

add_action( 'wp_enqueue_scripts', 'dequeue_menu_image_style', 11 );

function dequeue_menu_image_style() {
     wp_dequeue_style( 'menu-image' );
}