<?php

add_filter( 'redirect_canonical', function($redirect_url) {

    if( is_404() ) {
        return false;
    }
        return $redirect_url;

} );