<?php

/* Disable the default WooCommerce stylesheet. */

add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );