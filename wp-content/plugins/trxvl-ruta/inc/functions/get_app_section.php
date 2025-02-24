<?php
function get_app_section($data)
{
    $post_id = $data['id'];
    $blocks = parse_blocks(get_the_content(null, false, $post_id));

    foreach ($blocks as $block) {
        if ($block['blockName'] === 'acf/app') {
            $background_id = $block['attrs']['data']['app_background'] ?? null;
            $title_id = $block['attrs']['data']['app_title'] ?? null;
            $description_id = $block['attrs']['data']['app_description'] ?? null;
            $image_id = $block['attrs']['data']['app_image'] ?? null;
            $button_mobile = $block['attrs']['data']['button_mobile'] ?? null;
            $button_email = $block['attrs']['data']['button_email'] ?? null;
            $text = $block['attrs']['data']['app_text'] ?? null;
            $search_text = $block['attrs']['data']['search_text'] ?? null;
            $search_button = $block['attrs']['data']['button_search'] ?? null;
            $google_id = $block['attrs']['data']['google_store'] ?? null;
            $appstore_id = $block['attrs']['data']['app_store'] ?? null;

            return [
                'background_image' => $background_id ? wp_get_attachment_url($background_id) : null,
                'app_title' => $title_id,
                'app_description' => $description_id,
                'app_image' => $image_id ? wp_get_attachment_url($image_id) : null,
                'button_mobile' => $button_mobile,
                'button_email' => $button_email,
                'app_text' => $text,
                'search_text' => $search_text,
                'button_search' => $search_button,
                'google_store'     => $google_id ? wp_get_attachment_url($google_id) : null,
                'app_store'     => $appstore_id ? wp_get_attachment_url($appstore_id) : null,
            ];
        }
    }

    return null;
}
