<?php
function get_highlights()
{
    $query = new WP_Query([
        'post_type'      => 'post',
        'posts_per_page' => -1,
        'category_name'  => 'highlights',
    ]);

    $items = [];

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();

            $items[] = [
                'id'    => get_the_ID(),
                'title' => get_the_title(),
                'image' => get_the_post_thumbnail_url(get_the_ID(), 'full') ?: '', // Get full-size featured image
            ];
        }
        wp_reset_postdata();
    }

    return rest_ensure_response($items);
}
