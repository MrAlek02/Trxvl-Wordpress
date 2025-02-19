<?php

// Disable REST API completely
// add_filter('rest_enabled', '_return_false');
// add_filter('rest_jsonp_enabled', '_return_false');

function disable_user_rest_endpoints( $endpoints ) {

    if ( isset( $endpoints['/wp/v2/users'] ) ) {

            unset( $endpoints['/wp/v2/users'] );

    }

    if ( isset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] ) ) {

            unset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] );

    }

    return $endpoints;
    
    }

add_filter( 'rest_endpoints', 'disable_user_rest_endpoints'); 