<?php
function get_properties_data($request)
{
    $property_id = isset($request['id']) ? $request['id'] : null;

    if ($property_id) {
        // Get a single taxonomy term by ID
        $property = get_term($property_id, 'property');

        if (is_wp_error($property) || !$property) {
            return new WP_Error('no_property', 'Property not found', array('status' => 404));
        }

        // Get term image (custom function, adjust accordingly)
        $property_image = function_exists('get_taxonomy_image') ? get_taxonomy_image($property_id) : '';

        return array(
            'id'    => $property->term_id,
            'name'  => $property->name,
            'image' => $property_image,
        );
    } else {
        // Get all terms in 'property' taxonomy
        $properties = get_terms(array(
            'taxonomy'   => 'property',
            'hide_empty' => false, // Change to true to hide empty categories
        ));

        if (empty($properties) || is_wp_error($properties)) {
            return new WP_Error('no_properties', 'No properties found', array('status' => 404));
        }

        $properties_data = array_map(function ($property) {
            $property_image = function_exists('get_taxonomy_image') ? get_taxonomy_image($property->term_id) : '';
            return array(
                'id'    => $property->term_id,
                'name'  => $property->name,
                'image' => $property_image,
            );
        }, $properties);

        return $properties_data;
    }
}
