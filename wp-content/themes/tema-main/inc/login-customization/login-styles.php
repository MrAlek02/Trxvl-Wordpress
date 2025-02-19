<?php

function theme_add_login_styles() {
	wp_enqueue_style('theme-login-style', get_template_directory_uri() . '/public/login.css' );
}
add_action( 'login_enqueue_scripts', 'theme_add_login_styles' );