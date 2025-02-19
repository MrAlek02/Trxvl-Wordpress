<?php

if ( !empty ( $GLOBALS['sitepress'] ) ) {

    function remove_wpml_generator() {
    
        remove_action(
            current_filter(),
            array ( $GLOBALS['sitepress'], 'meta_generator_tag' )
        );
    
    }

    add_action( 'wp_head', 'remove_wpml_generator', 0 );
    
} 