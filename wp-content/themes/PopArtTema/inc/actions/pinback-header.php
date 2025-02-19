<?php

function theme_pingback_header() {

	if ( is_singular() && pings_open() ) {

		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';

	}
    
}

add_action( 'wp_head', 'theme_pingback_header' );