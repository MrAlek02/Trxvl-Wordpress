<?php

function theme_woocommerce_thumbnail_columns() {

	return 4;
    
}

add_filter( 'woocommerce_product_thumbnails_columns', 'theme_woocommerce_thumbnail_columns' );