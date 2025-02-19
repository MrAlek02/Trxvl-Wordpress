<?php
    add_filter('wpml_hreflangs', function($hreflang_items) {
        if (is_singular()) {
            $post_type = 'post_' . get_post_type();
            $element_id = get_the_ID();
            $trid = apply_filters('wpml_element_trid', false, $element_id, $post_type);
            $translations = apply_filters('wpml_get_element_translations', [], $trid, $post_type);
            
            //remove x-default everywhere
            if (isset($hreflang_items['x-default'])) {
                unset($hreflang_items['x-default']);
            }
            
            //specific case (we had serbian and english) and we needed to disable hreflang where there was only serbian
            if (!array_key_exists("en", $translations)) {
                foreach($hreflang_items as $item_key => $item_value){
                    unset($hreflang_items[$item_key]);
                }
            }
        }
        return $hreflang_items;
    });