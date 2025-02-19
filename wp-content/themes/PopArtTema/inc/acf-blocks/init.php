<?php

function my_acf_init() {
	
	if( function_exists('acf_register_block') ) {

        $dir = THEME_DIR . "/inc/acf-blocks/blocks";
        $files = scan_php_files($dir);
		
        foreach ($files as $item) {

            $templateName = 'blocks/' . substr($item, strlen($dir) + 1);

            require_once $templateName;
            
        }
        
	}
    
}

add_action('acf/init', 'my_acf_init');