<?php

function ajax__load_more_posts() { 

    $page = $_POST["page"];

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 1,
		'post_status'    => 'publish',
        'paged' => $page,
    );
    
    $query = new WP_Query( $args );
    
    if ( $query->have_posts() ) : 
    while ( $query->have_posts() ) : $query->the_post(); ?>

    <?php the_title();?>

    <?php endwhile; endif; ?>

    <?php if($query->max_num_pages <= $page):?>
        <span class="last-page"></span>
    <?php endif;?>

    <?php if($query->max_num_pages == 0 && !empty($search)):?>
        <span class="search-results">No results for: <?php echo $search?></span>
    <?php endif;?>

    <?php if($query->max_num_pages != 0 && !empty($search)):?>
        <span class="search-results">Search results for: <?php echo $search?></span>
    <?php endif;?>

    <?php exit;
}

add_action('wp_ajax_nopriv_load_more_posts', 'ajax__load_more_posts');
add_action('wp_ajax_load_more_posts', 'ajax__load_more_posts');