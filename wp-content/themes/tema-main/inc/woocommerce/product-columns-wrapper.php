<?php

if ( ! function_exists( 'woocommerce_product_columns_wrapper' ) ) {

	function woocommerce_product_columns_wrapper() {

		$columns = theme_woocommerce_loop_columns();

		echo '<div class="columns-' . absint( $columns ) . '">';

	}

}

add_action( 'woocommerce_before_shop_loop', 'woocommerce_product_columns_wrapper', 40 );

if ( ! function_exists( 'theme_woocommerce_product_columns_wrapper_close' ) ) {
    
	function theme_woocommerce_product_columns_wrapper_close() {

		echo '</div>';

	}

}

add_action( 'woocommerce_after_shop_loop', 'theme_woocommerce_product_columns_wrapper_close', 40 );

/* Remove default WooCommerce wrapper. */

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );