<?php

add_shortcode( 'demo_shortcode', function($atts, $content = null){

    // [demo_shortcode some_value="Some text"]
    // [demo_shortcode]This is some content[/demo_shortcode]
    $attributes = shortcode_atts( [
        'some_value' => 'Some default value'
    ], $atts);

    return 'some_value = ' . $attributes['some_value'] . $content;

});