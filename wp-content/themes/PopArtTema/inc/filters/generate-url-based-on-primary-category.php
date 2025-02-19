<?php

add_filter( 'wc_product_post_type_link_product_cat', function( $term, $terms, $post ) {

    $primary_cat_id = get_post_meta( $post->ID, '_yoast_wpseo_primary_product_cat', true );

    if ( $primary_cat_id && $term->term_id != $primary_cat_id ) {

        foreach ( $terms as $term_key => $term_object ) {

            if ( $term_object->term_id == $primary_cat_id ) {
                
                $term = $terms[ $term_key ];
                break;
                
            }

        }

    }

    return $term;

}, 10, 3 );