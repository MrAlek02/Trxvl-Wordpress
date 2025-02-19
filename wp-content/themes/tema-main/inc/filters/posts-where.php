<?php

function cf_search_where( $where ) {

    global $pagenow, $wpdb;

    if (is_search() && !is_admin()) {

        $where = preg_replace(
            "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
            "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where);

    }

    return $where;

}

add_filter('posts_where', 'cf_search_where');