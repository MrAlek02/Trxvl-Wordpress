<?php

function dequeue_dashicons() {

    if ( ! is_user_logged_in() ) {

        wp_deregister_style( 'dashicons' );

    }

}

add_action( 'wp_enqueue_scripts', 'dequeue_dashicons' );