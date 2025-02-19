<?php

function featured_description( $content, $post_id, $thumbnail_id ) {

	if ( 'page' == get_post_type( $post_id ) ) {

			return $content;

	}
    
	$caption = '<p>' . esc_html__( 'Recommended image size: 844px (width) x 600px (height)', 'i18n-tag' ) . '</p>';

	return $content . $caption;
}

add_filter( 'admin_post_thumbnail_html', 'featured_description', 10, 3 );