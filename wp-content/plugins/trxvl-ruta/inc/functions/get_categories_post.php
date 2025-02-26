<?php

function get_category_acf_post($data)
{
    // Get category ID from the URL parameter
    $category_id = $data['category_id'];

    // Check if the category exists
    $category = get_category($category_id);
    if (!$category) {
        return new WP_Error('no_category', 'Category not found', ['status' => 404]);
    }

    // Query posts from this category using WP_Query
    $args = [
        'post_type'      => 'post',
        'posts_per_page' => -1,  // Get all posts in the category
        'cat'            => $category_id,  // Specify category by ID
    ];

    $category_posts_query = new WP_Query($args);

    // Prepare posts data from category query
    $category_posts_data = [];
    if ($category_posts_query->have_posts()) {
        while ($category_posts_query->have_posts()) {
            $category_posts_query->the_post();
            $post_id = get_the_ID();

            // Collect ACF fields for each post
            $category_posts_data[] = [
                'id'                => $post_id,
                'title'             => get_the_title(),
                'url'               => get_permalink(),
                'excerpt'           => get_the_excerpt(),
                'thumbnail'         => get_the_post_thumbnail_url($post_id), // Post thumbnail URL
                'rating'            => get_field('rating', $post_id),
                'star'              => get_field('star', $post_id),
                'stays'             => get_field('days_nights', $post_id),
                'flights_text'      => get_field('flights_text', $post_id),
                'flights'           => get_field('flights', $post_id),
                'hotels_text'       => get_field('hotels_text', $post_id),
                'hotels'            => get_field('hotels', $post_id),
                'transfers_text'    => get_field('transfers_text', $post_id),
                'transfers'         => get_field('transfers', $post_id),
                'activities_text'   => get_field('activities_text', $post_id),
                'activities'        => get_field('activities', $post_id),
                'list'              => get_field('list', $post_id),
                'price_text'        => get_field('price_text', $post_id),
                'price_sale_text'   => get_field('price_sale_text', $post_id),
                'per'               => get_field('per_person', $post_id),
            ];
        }
        wp_reset_postdata(); // Reset post data after custom query
    }

    return rest_ensure_response($category_posts_data);
}
