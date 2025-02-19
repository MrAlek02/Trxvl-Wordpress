<?php

function theme_woocommerce_loop_columns() {

	return 3;
    
}

add_filter( 'loop_shop_columns', 'theme_woocommerce_loop_columns' );