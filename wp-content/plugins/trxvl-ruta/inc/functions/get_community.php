<?php
function get_community()
{
    $query = new WP_Query([
        'post_type'      => 'community',
        'posts_per_page' => -1, // Get all posts
        'no_found_rows'  => true, // Optimize performance
    ]);

    $items = [];

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();

            $items[] = [
                'id'          => get_the_ID(),
                'title'       => get_the_title(),
                'description' => get_the_excerpt(),
                'image'       => get_the_post_thumbnail_url(get_the_ID(), 'full') ?: '',
            ];
        }
        wp_reset_postdata();
    }

    return rest_ensure_response($items);
}
