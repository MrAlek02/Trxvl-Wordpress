<?php

function load_wpcf7_scripts() {

    if ( !is_page('kontakt') ) {

      wp_dequeue_script( 'contact-form-7' );
      wp_dequeue_style( 'contact-form-7' );

    }
    
}
  
add_action('wp_enqueue_scripts', 'load_wpcf7_scripts');