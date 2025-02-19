<?php

function img($name, $classes = '', $alt = '', $width = 50, $height = 50, $isLazy = false) {
    $path = THEME_URL . '/src/images/' . $name;
    $loading = $isLazy ? 'lazy' : 'eager';
    ?>
    <img 
        src="<?php echo esc_url($path);?>" 
        class="<?php echo esc_attr($classes);?>" 
        alt="<?php echo esc_attr($alt);?>" 
        width="<?php echo esc_attr($width);?>" 
        height="<?php echo esc_attr($height);?>"
        loading="<?php echo esc_attr($loading);?>"
    >
<?php
}