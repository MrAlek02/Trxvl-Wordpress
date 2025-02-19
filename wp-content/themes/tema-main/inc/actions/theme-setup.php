<?php

function theme_setup() {

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	register_nav_menus( array(
		'Primary' => esc_html__( 'Primary', THEME_NAME ),
		'Secondary' => esc_html__( 'Secondary', THEME_NAME ),
	) );

	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'script', 
		'style'
	) );

	add_theme_support( 'custom-background', apply_filters( 'theme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	add_theme_support( 'custom-logo', array(
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );
    
}

add_action( 'after_setup_theme', 'theme_setup' );