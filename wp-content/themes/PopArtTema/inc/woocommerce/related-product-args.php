<?php

function woocommerce_related_products_args( $args ) {

	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
    
}

add_filter( 'woocommerce_output_related_products_args', 'woocommerce_related_products_args' );