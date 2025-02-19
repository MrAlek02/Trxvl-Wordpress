<?php

function theme_woocommerce_products_per_page() {

	return 12;
    
}

add_filter( 'loop_shop_per_page', 'theme_woocommerce_products_per_page' );