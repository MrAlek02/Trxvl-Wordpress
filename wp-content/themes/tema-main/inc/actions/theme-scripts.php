<?php

function theme_scripts() {

	$script_url = THEME_URL . '/public/main.js';
	$script_path = THEME_DIR . '/public/main.js';

	wp_enqueue_script('script', $script_url, array(), filemtime($script_path), true);
	wp_localize_script('script', 'globals', [
		'ajax_url' => admin_url('admin-ajax.php'),
	]);
    
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );