<?php /* Before <!-- more --> */ ?>

<?php 
    $content = get_post_field( 'post_content', get_the_ID() );
    $content_parts = get_extended( $content );
    echo $content_parts['main'];
?>

<?php /* After <!-- more --> */ ?>

<?php echo apply_filters('the_content', $content_parts['extended']); ?>

<?php /* Trim to 195 letters */ ?>

<?php echo strip_tags(mb_strimwidth( get_the_content(), 0, 195, '...')); ?>