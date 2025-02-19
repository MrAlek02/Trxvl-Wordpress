<?php

function webp_upload($existing_mimes) {

    $existing_mimes['webp'] = 'image/webp';

    return $existing_mimes;

}

add_filter('mime_types', 'webp_upload');

function make_webp_displayable($result, $path) {

    if ($result === false) {

        $displayable_image_types = array( IMAGETYPE_WEBP );
        $info = @getimagesize( $path );

        if (empty($info) || !in_array($info[2], $displayable_image_types)) {

            $result = false;

        } else {

            $result = true;
            
        }

    }

    return $result;

}

add_filter('file_is_displayable_image', 'make_webp_displayable', 10, 2);