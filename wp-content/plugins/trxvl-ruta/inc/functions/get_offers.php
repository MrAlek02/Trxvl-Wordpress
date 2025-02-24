<?php
function my_post_type_args($args, $post_type)
{

    if ('offer' === $post_type) {
        $args['show_in_rest'] = true;

        // Optionally customize the rest_base or rest_controller_class
        $args['rest_base']             = 'offers';
        $args['rest_controller_class'] = 'WP_REST_Posts_Controller';
    }

    return $args;
}

function get_offers()
{
    $query = new WP_Query([
        'post_type'      => 'offer',
        'posts_per_page' => -1, // Get all posts
        'no_found_rows'  => true, // Optimize performance
    ]);

    $items = [];

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();

            // Get custom fields if using ACF
            $subtitle    = get_field('subtitle') ?: ''; // Change 'subtitle' to your actual ACF field name
            $textbutton       = get_field('text_button') ?: ''; // Example price field

            $items[] = [
                'id'          => get_the_ID(),
                'title'       => get_the_title(),
                'description' => get_the_excerpt(),
                'subtitle'    => $subtitle, // Add subtitle
                'textbutton'       => $textbutton, // Add price
                'image'       => get_the_post_thumbnail_url(get_the_ID(), 'full') ?: '', // Featured image
            ];
        }
        wp_reset_postdata();
    }

    return rest_ensure_response($items);
}
