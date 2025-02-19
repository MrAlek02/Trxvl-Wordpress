<?php

function cf_search_join( $join ) {

    global $wpdb;

    if (is_search() && !is_admin()) {  

        $join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';

    }

    return $join;

}

add_filter('posts_join', 'cf_search_join');