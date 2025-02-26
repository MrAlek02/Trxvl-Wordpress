<?php
function get_category_acf_fields($data)
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

    // Get ACF relationship field 'posts' for the category
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

    // Get ACF fields for the category
    $acf_fields = [
        'title'               => get_field('title', 'category_' . $category_id),
        'hero_background'     => get_field('hero_background', 'category_' . $category_id),
        'search_text'         => get_field('search_text', 'category_' . $category_id),
        'search_image'        => get_field('search_image', 'category_' . $category_id),
        'check_in'            => get_field('check_in', 'category_' . $category_id),
        'checks_image'        => get_field('checks_image', 'category_' . $category_id),
        'check_out'           => get_field('check_out', 'category_' . $category_id),
        'person_image'        => get_field('person_image', 'category_' . $category_id),
        'persons_select'      => get_field('persons_select', 'category_' . $category_id),
        'button_text'         => get_field('button', 'category_' . $category_id),
        'title_categories'    => get_field('title_categories', 'category_' . $category_id),
        'title_destinations'  => get_field('title_destinations', 'category_' . $category_id),
        'category_posts'      => $category_posts_data, // Include the posts from the category query
        'title_recently'      => get_field('title_recently', 'category_' . $category_id),
        'posts'               => $acf_posts_data, // Include the ACF relationship posts
        'bonanza_background'  => get_field('bonanza_background', 'category_' . $category_id),
        'bonanza_title'       => get_field('bonanza_title', 'category_' . $category_id),
        'bonanza_text'        => get_field('bonanza_text', 'category_' . $category_id),
        'title_packages'      => get_field('title_packages', 'category_' . $category_id),
        'inclusive_packages'  => get_field('inclusive_packages', 'category_' . $category_id),
        'title_honeymoon'     => get_field('title_honeymoon', 'category_' . $category_id),
        'honeymoon'           => get_field('honeymoon', 'category_' . $category_id),
    ];

    return rest_ensure_response($acf_fields);
}
