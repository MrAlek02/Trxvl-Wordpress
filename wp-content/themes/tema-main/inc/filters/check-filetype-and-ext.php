<?php

add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
	
	global $wp_version; 
    
    if( $wp_version == '4.7' || ( (float) $wp_version < 4.7 ) ) { 
        
        return $data; 
    
    }

	$filetype = wp_check_filetype( $filename, $mimes );

	return [ 'ext' => $filetype['ext'], 'type' => $filetype['type'], 'proper_filename' => $data['proper_filename'] ];
    
}, 10, 4 );