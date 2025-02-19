<?php

function redirect_to_home_if_author_parameter() {

	$is_author_set = get_query_var( 'author', '' );
    
	if ( $is_author_set != '' && !is_admin()) {

		wp_redirect( home_url(), 301 );
		exit;

	}

}

add_action( 'template_redirect', 'redirect_to_home_if_author_parameter' );