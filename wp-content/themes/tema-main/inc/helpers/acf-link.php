<?php

function acf_link($link, $classes = '', $content = '') {
    if($link) {
        $link_title = empty($content) ? $link['title'] : $content;
        $link_url = $link['url'];
        $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
    <a 
    href="<?php echo esc_url($link_url); ?>" 
    target="<?php echo esc_attr($link_target); ?>" 
    class="<?php echo esc_attr($classes);?>">
        <?php echo esc_html($link_title);?>
    </a>
    <?php
    }
}