<?php

function theme_loginlogo_url($url) {
	return esc_url( home_url( '/' ) );
}
add_filter( 'login_headerurl', 'theme_loginlogo_url' );