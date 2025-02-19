<?php

function get_featured_image( $postID, $size, $classes = '', $loading = 'lazy' ) { 
    
    $imageID = get_post_thumbnail_id( $postID );
    $image = wp_get_attachment_image_src( $imageID, $size );
    $imageUrl = $image[0];
    $imageWidth = $image[1];
    $imageHeight = $image[2];
    $imageAlt = get_post_meta ( $imageID, '_wp_attachment_image_alt', true );
    
    ?>

    <img class="<?php echo esc_attr( $classes ); ?>" 
         src="<?php echo esc_url( $imageUrl ); ?>" 
         alt="<?php echo esc_attr( $imageAlt ); ?>" 
         width="<?php echo esc_attr( $imageWidth ); ?>" 
         height="<?php echo esc_attr( $imageHeight ); ?>" 
         loading="<?php echo esc_attr( $loading ); ?>">

<?php }