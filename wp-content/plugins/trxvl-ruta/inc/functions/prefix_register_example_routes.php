<?php

/**
 * This function is where we register our routes for our example endpoint.
 */
function prefix_register_example_routes()
{
    register_rest_route('trxvl-ruta/v1', '/posts', array(
        'methods'  => WP_REST_Server::READABLE,
        'callback' => 'get_highlights',
    ));
    register_rest_route('trxvl-ruta/v1', '/categories/(?P<id>\d+)', array(
        'methods'  => WP_REST_Server::READABLE,
        'callback' => 'get_categories_data',
        'args'     => array(
            'id' => array(
                'required' => true,
                'validate_callback' => function ($param, $request, $key) {
                    return is_numeric($param);
                }
            )
        ),
    ));
    register_rest_route('trxvl/v1', '/app/(?P<id>\d+)', [
        'methods'  => WP_REST_Server::READABLE,
        'callback' => 'get_app_section',
    ]);
    register_rest_route('trxvl/v1', '/image/(?P<id>\d+)', [
        'methods'  => WP_REST_Server::READABLE,
        'callback' => 'get_page_image',
    ]);
    register_rest_route('trxvl/v1', '/properties', [
        'methods'  => WP_REST_Server::READABLE,
        'callback' => 'get_properties_data',
    ]);
    register_rest_route('trxvl/v1', '/page/(?P<id>\d+)', [
        'methods'  => WP_REST_Server::READABLE,
        'callback' => 'get_hero_background_image',
    ]);
    register_rest_route('trxvl/v1', '/offers', [
        'methods'  => WP_REST_Server::READABLE,
        'callback' => 'get_offers',
    ]);
    register_rest_route('trxvl/v1', '/community', [
        'methods'  => WP_REST_Server::READABLE,
        'callback' => 'get_community',
    ]);
    register_rest_route('trxvl/v1', '/footer', [
        'methods'  => WP_REST_Server::READABLE,
        'callback' => 'get_footer_data',
    ]);
    register_rest_route('trxvl/v1', '/categories/(?P<category_id>\d+)', [
        'methods' => 'GET',
        'callback' => 'get_category_acf_fields',
        'args' => [
            'category_id' => [
                'validate_callback' => function ($param, $request, $key) {
                    return is_numeric($param);
                }
            ]
        ]
    ]);
    register_rest_route('trxvl/v1', '/categories/post/(?P<category_id>\d+)', [
        'methods' => 'GET',
        'callback' => 'get_category_acf_post',
        'args' => [
            'category_id' => [
                'validate_callback' => function ($param, $request, $key) {
                    return is_numeric($param);
                }
            ]
        ]
    ]);
    register_rest_route('trxvl/v1', '/categories/recently/(?P<category_id>\d+)', [
        'methods' => 'GET',
        'callback' => 'get_category_recently',
        'args' => [
            'category_id' => [
                'validate_callback' => function ($param, $request, $key) {
                    return is_numeric($param);
                }
            ]
        ]
    ]);
    register_rest_route('trxvl/v1', '/categories/inclusive/(?P<category_id>\d+)', [
        'methods' => 'GET',
        'callback' => 'get_category_inclusive',
        'args' => [
            'category_id' => [
                'validate_callback' => function ($param, $request, $key) {
                    return is_numeric($param);
                }
            ]
        ]
    ]);
    register_rest_route('trxvl/v1', '/categories/honeymoon/(?P<category_id>\d+)', [
        'methods' => 'GET',
        'callback' => 'get_category_honeymoon',
        'args' => [
            'category_id' => [
                'validate_callback' => function ($param, $request, $key) {
                    return is_numeric($param);
                }
            ]
        ]
    ]);
}
