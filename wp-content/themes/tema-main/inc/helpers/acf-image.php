<?php

function acf_image($image, $classes = '', $isLazy = false) { 
    if($image) {
        extract($image);
        $loading = $isLazy ? 'lazy' : 'eager';
        $image_extension = strtolower(pathinfo(esc_url($url), PATHINFO_EXTENSION)); 
        if( strtolower($image_extension) == 'svg' ) {
            $width = 'auto';
            $height= 'auto';
        }
    ?>
    <img 
        src="<?php echo esc_url($url);?>" 
        class="<?php echo esc_attr($classes);?>" 
        alt="<?php echo esc_attr($alt);?>" 
        width="<?php echo esc_attr($width);?>" 
        height="<?php echo esc_attr($height);?>"
        loading="<?php echo esc_attr($loading);?>"
    >
    <?php 
    }
}