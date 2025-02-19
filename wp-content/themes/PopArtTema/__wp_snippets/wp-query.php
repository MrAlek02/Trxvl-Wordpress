<?php
/*------------------------------------------------------------------------------------------
# WP Query
------------------------------------------------------------------------------------------*/
?>
<?php
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 1,
    'post_status'    => 'publish',
    'paged' => $page,
    's' => $search,
    'tag' => $tags,
    'tax_query' => array( 
        'relation' => 'OR',
        array(
            'taxonomy' => 'category',
            'field'    => 'slug',
            'terms'    => $categories_arr,
        ),
        array(
            'taxonomy' => 'industries',
            'field'    => 'slug',
            'terms'    => $industries_arr,
            )
        )
);

// if(empty($categories) && empty($industries)) {
//     unset($args['tax_query']);
// }

$query = new WP_Query( $args );
?>

<?php if ( $query->have_posts() ) : ?>
<?php while ( $query->have_posts() ) : $query->the_post(); ?>

<?php the_title(); ?>

<?php endwhile; ?>
<?php endif; ?>

<?php wp_reset_query(); ?>