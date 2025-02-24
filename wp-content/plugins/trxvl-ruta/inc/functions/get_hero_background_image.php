<?php
function get_hero_background_image($data)
{
    $post_id = $data['id'];
    $blocks = parse_blocks(get_the_content(null, false, $post_id));

    foreach ($blocks as $block) {
        if ($block['blockName'] === 'acf/hero') { // Adjust to match your block name
            $background_id = $block['attrs']['data']['background_image'] ?? null;
            $search_id = $block['attrs']['data']['search_image'] ?? null;
            $checks_id = $block['attrs']['data']['checks_image'] ?? null;
            $persons_id = $block['attrs']['data']['persons_image'] ?? null;

            return [
                'background_image' => $background_id ? wp_get_attachment_url($background_id) : null,
                'search_image'     => $search_id ? wp_get_attachment_url($search_id) : null,
                'checks_image'     => $checks_id ? wp_get_attachment_url($checks_id) : null,
                'persons_image'     => $persons_id ? wp_get_attachment_url($persons_id) : null,
            ];
        }
    }

    return null; // Return null if the hero block isn't found
}
