<?php

// Add type module to script tag

function add_type_attribute_to_module_script($tag, $handle, $src)
{
    if ('theme-script' === $handle) {
        $tag = '<script type="module" src="' . esc_url($src) . '"></script>';
    }
    return $tag;
}

add_filter('script_loader_tag', 'add_type_attribute_to_module_script', 10, 3);
