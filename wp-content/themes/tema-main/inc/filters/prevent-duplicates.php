<?php

function cf_search_distinct( $where ) {

    global $wpdb;

    if (is_search() && !is_admin()) {

        return "DISTINCT";

    }

    return $where;

}

add_filter('posts_distinct', 'cf_search_distinct');