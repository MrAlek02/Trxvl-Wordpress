<?php

function filter_block_categories_when_post_provided( $block_categories, $editor_context ) {

    if ( ! empty( $editor_context->post ) ) {

        array_push(
            $block_categories,
            array(
                'slug'  => 'popart-blocks',
                'title' => __( 'Popart Blocks', 'custom-plugin' ),
                'icon'  => null,
            )
        );
        
    }

    return $block_categories;
}

add_filter( 'block_categories_all', 'filter_block_categories_when_post_provided', 10, 2 );