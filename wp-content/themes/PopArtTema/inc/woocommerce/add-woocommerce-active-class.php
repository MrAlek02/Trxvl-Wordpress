<?php

function woocommerce_active_body_class( $classes ) {

	$classes[] = 'woocommerce-active';

	return $classes;
    
}

add_filter( 'body_class', 'woocommerce_active_body_class' );