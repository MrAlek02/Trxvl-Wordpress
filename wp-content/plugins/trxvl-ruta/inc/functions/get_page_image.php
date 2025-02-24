<?php

function get_page_image($data)
{
    $post_id = $data['id'];
    $blocks = parse_blocks(get_the_content(null, false, $post_id));

    foreach ($blocks as $block) {
        if ($block['blockName'] === 'acf/page') {
            $image_id = $block['attrs']['data']['image'] ?? null;
            $image_title = $block['attrs']['data']['image_title'] ?? null;
            $image_text = $block['attrs']['data']['image_text'] ?? null;

            return [
                'image'       => $image_id ? wp_get_attachment_url($image_id) : null,
                'image_title' => $image_title ?: null,
                'image_text'  => $image_text ?: null,
            ];
        }
    }

    return null;
}
