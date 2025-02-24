<?php
function get_footer_data()
{
    // Fetching ACF fields
    $footer_menus = get_field('footer_menus', 'option') ?: [];
    $footer_social = get_field('footer_social', 'option') ?: [];

    return [
        'footer_logo'  => get_field('footer_logo', 'option'),
        'button_text'  => get_field('button_text', 'option'),
        'footer_menus' => array_map(function ($menu) {
            return [
                'menu_items'  => $menu['menu_items'] ?? '',
            ];
        }, $footer_menus),
        'footer_social' => array_map(function ($social) {
            $social_image_url = '';
            if (is_array($social['social_image']) && isset($social['social_image']['url'])) {
                $social_image_url = $social['social_image']['url'];
            }

            return [
                'social_image_url' => $social_image_url,
                'social_link'      => $social['social_link'] ?? '',
            ];
        }, $footer_social),
    ];
}
