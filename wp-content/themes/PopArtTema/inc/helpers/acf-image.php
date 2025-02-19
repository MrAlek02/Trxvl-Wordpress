<?php
function acf_image($image, $classes = '', $isLazy = false, $isPicture = false) {
    if ($image && isset($image['ID'], $image['url'])) {
        $loading = $isLazy ? 'lazy' : 'eager';
        $alt = !empty($image['alt']) ? $image['alt'] : (!empty($image['title']) ? $image['title'] : '');
        $image_extension = strtolower(pathinfo($image['url'], PATHINFO_EXTENSION));

        // Define responsive image sizes
        $sizes = [
            'thumbnail' => [
                'url' => wp_get_attachment_image_url($image['ID'], 'thumbnail'),
                'width' => $image['sizes']['thumbnail-width'] ?? '',
            ],
            'medium' => [
                'url' => wp_get_attachment_image_url($image['ID'], 'medium'),
                'width' => $image['sizes']['medium-width'] ?? '',
            ],
            'medium_large' => [
                'url' => wp_get_attachment_image_url($image['ID'], 'medium_large'),
                'width' => $image['sizes']['medium_large-width'] ?? '',
            ],
            'large' => [
                'url' => wp_get_attachment_image_url($image['ID'], 'large'),
                'width' => $image['sizes']['large-width'] ?? '',
            ],
            'full' => [
                'url' => wp_get_attachment_image_url($image['ID'], 'full'),
                'width' => $image['width'] ?? '',
            ],
        ];

        // Fallback dimensions
        $width = $image['width'] ?? '';
        $height = $image['height'] ?? '';

        if ($image_extension !== 'svg' && file_exists(get_attached_file($image['ID']))) {
            list($width, $height) = getimagesize(get_attached_file($image['ID']));
        }

        if ($isPicture) {
            ?>
<picture class="<?php echo esc_attr($classes); ?>">
    <source srcset="<?php echo esc_url($sizes['full']['url']); ?>"
        media="(min-width: <?php echo esc_attr($sizes['large']['width']); ?>px)">
    <source srcset="<?php echo esc_url($sizes['large']['url']); ?>"
        media="(min-width: <?php echo esc_attr($sizes['medium_large']['width']); ?>px)">
    <source srcset="<?php echo esc_url($sizes['medium_large']['url']); ?>"
        media="(min-width: <?php echo esc_attr($sizes['medium']['width']); ?>px)">
    <source srcset="<?php echo esc_url($sizes['medium']['url']); ?>"
        media="(min-width: <?php echo esc_attr($sizes['thumbnail']['width']); ?>px)">
    <img class="<?php echo esc_attr($classes); ?>"
        src="<?php echo esc_url($sizes['thumbnail']['url'] ?? $image['url']); ?>" alt="<?php echo esc_attr($alt); ?>"
        width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>"
        loading="<?php echo esc_attr($loading); ?>" title="<?php echo esc_attr($image['title'] ?? ''); ?>">
</picture>
<?php
        } else {
            ?>
<img class="<?php echo esc_attr($classes); ?>" alt="<?php echo esc_attr($alt); ?>"
    width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>"
    loading="<?php echo esc_attr($loading); ?>" title="<?php echo esc_attr($image['title'] ?? ''); ?>"
    src="<?php echo esc_url($image['url']); ?>"
    srcset="
                    <?php echo esc_url($sizes['thumbnail']['url'] ?? ''); ?> <?php echo esc_attr($sizes['thumbnail']['width'] ? $sizes['thumbnail']['width'] . 'w' : ''); ?>, 
                    <?php echo esc_url($sizes['medium']['url'] ?? ''); ?> <?php echo esc_attr($sizes['medium']['width'] ? $sizes['medium']['width'] . 'w' : ''); ?>, 
                    <?php echo esc_url($sizes['medium_large']['url'] ?? ''); ?> <?php echo esc_attr($sizes['medium_large']['width'] ? $sizes['medium_large']['width'] . 'w' : ''); ?>, 
                    <?php echo esc_url($sizes['large']['url'] ?? ''); ?> <?php echo esc_attr($sizes['large']['width'] ? $sizes['large']['width'] . 'w' : ''); ?>, 
                    <?php echo esc_url($sizes['full']['url'] ?? ''); ?> <?php echo esc_attr($sizes['full']['width'] ? $sizes['full']['width'] . 'w' : ''); ?>">
<?php
        }
    }
}
?>