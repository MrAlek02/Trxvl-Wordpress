<?php

function get_category_recently($data)
{
    // Get category ID from the URL parameter
    $category_id = $data['category_id'];

    // Check if the category exists
    $category = get_category($category_id);
    if (!$category) {
        return new WP_Error('no_category', 'Category not found', ['status' => 404]);
    }
    $acf_posts = get_field('posts', 'category_' . $category_id);
    $acf_posts_data = [];
    if ($acf_posts) {
        foreach ($acf_posts as $acf_post) {
            $acf_posts_data[] = [
                'id'                => $acf_post->ID,
                'title'             => get_the_title($acf_post->ID),
                'url'               => get_permalink($acf_post->ID),
                'excerpt'           => get_the_excerpt($acf_post->ID),
                'thumbnail'         => get_the_post_thumbnail_url($acf_post->ID),
                'rating'            => get_field('rating', $acf_post->ID),
                'star'              => get_field('star', $acf_post->ID),
                'stays'             => get_field('days_nights', $acf_post->ID),
                'flights_text'      => get_field('flights_text', $acf_post->ID),
                'flights'           => get_field('flights', $acf_post->ID),
                'hotels_text'       => get_field('hotels_text', $acf_post->ID),
                'hotels'            => get_field('hotels', $acf_post->ID),
                'transfers_text'    => get_field('transfers_text', $acf_post->ID),
                'transfers'         => get_field('transfers', $acf_post->ID),
                'activities_text'   => get_field('activities_text', $acf_post->ID),
                'activities'        => get_field('activities', $acf_post->ID),
                'list'              => get_field('list', $acf_post->ID),
                'price_text'        => get_field('price_text', $acf_post->ID),
                'price_sale_text'   => get_field('price_sale_text', $acf_post->ID),
                'per'               => get_field('per_person', $acf_post->ID),
            ];
        }
    }
    return rest_ensure_response($acf_posts_data);
}
