<?php

function my_acf_block_render_callback( $block ) {
	
	$slug = str_replace('acf/', '', $block['name']);
	
	if( file_exists( get_theme_file_path("/template-parts/block-{$slug}/block-{$slug}.php") ) ) {

		include( get_theme_file_path("/template-parts/block-{$slug}/block-{$slug}.php") );
        
	}
    
}