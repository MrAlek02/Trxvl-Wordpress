<?php
function get_categories_data($request)
{
    $category_id = $request['id'];

    // Get the category object
    $category = get_term($category_id, 'category');

    if (is_wp_error($category) || !$category) {
        return new WP_Error('no_category', 'Category not found', array('status' => 404));
    }

    // Get the category image (assuming you have a function like get_taxonomy_image)
    $category_image = function_exists('get_taxonomy_image') ? get_taxonomy_image($category_id) : '';

    return array(
        'name' => $category->name,
        'image' => $category_image,
    );
}
