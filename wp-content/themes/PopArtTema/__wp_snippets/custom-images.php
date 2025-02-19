<?php

/* Register new image dimension */

add_image_size( 'single-mobile', 400, 232 );

/* Custom srcset */

function custom_image_srcset_and_sizes($sources, $size_array, $image_src, $image_meta, $attachment_id) {

    $aux = explode('/', $image_meta['file']);
    $link = home_url( '/' ) . 'wp-content/uploads/' . $aux[0] . '/' . $aux[1] . '/';
    
    $test = $sources["1140"];
    unset($sources["1140"]);
    unset($sources["459"]);
    unset($sources["440"]);
    unset($sources["768"]);
    
    $sources['400'] = array(
        'url' => $link . $image_meta['sizes']['single-mobile']['file'],
        'descriptor' => 'w',
        'value' => '1000',
    );
    
    $sources['1140'] = $test;

    return $sources;
}

add_filter('wp_calculate_image_srcset', 'custom_image_srcset_and_sizes', 10, 5);

/* Custom sizes */

function custom_image_sizes($sizes) {
    return "(max-width: 1140px) 100vw, 1140px";
}

add_filter('wp_calculate_image_sizes', 'custom_image_sizes', 10, 1);