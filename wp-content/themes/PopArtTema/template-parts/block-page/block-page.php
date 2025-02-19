<?php
$titleOff = get_field("offers_title");
$titlePro = get_field("properties_title");
$titleCom = get_field("community_title");
$image = get_field("image");
$imageTitle = get_field("image_title");
$imageText = get_field("image_text");

?>



<div class="page">
    <div class="container-left">
        <div class="subtitle | js-about">
            <h1><?= $titleOff ?></h1>
        </div>
        <div class="swiper">
            <div class="swiper-wrapper">
                <?php
                $query = new WP_Query([
                    'post_type'      => 'offer',
                    'posts_per_page' => -1,
                ]);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();

                        $post_id     = get_the_ID();
                        $title       = get_the_title($post_id);
                        $img         = get_the_post_thumbnail_url($post_id);
                        $description = get_the_excerpt();
                        $subtitle    = get_field('subtitle', $post_id);
                        $text        = get_field('text_button', $post_id);

                ?>
                        <div class="swiper-slide">
                            <div class="card | js-about">
                                <img src="<?= esc_url($img) ?>" class="card-image" />
                                <div class="card-content">
                                    <h4 class="card-subtitle"><?= esc_html($title) ?></h4>
                                    <h2 class="card-title"><?= esc_html($subtitle) ?></h2>
                                    <p class="card-description"><?= esc_html($description) ?></p>
                                    <button class="card-button"><?= esc_html($text) ?></button>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                else : ?>
                    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                <?php endif;
                ?>
            </div>
        </div>
    </div>
    <div class="property">
        <div class="container">
            <div class="subtitle | js-property">
                <h1><?= $titlePro ?></h1>
            </div>
        </div>
        <div class="destinations">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php
                    $properties = get_terms([
                        'taxonomy' => 'property',
                        'hide_empty' => false
                    ]);

                    if (!empty($properties)): ?>
                        <?php foreach ($properties as $property):
                            $text = $property->name;
                            $link = get_term_link($property);
                        ?>
                            <div class="swiper-slide">
                                <div class="destination | js-property">
                                    <a href="#"><img src="<?= get_taxonomy_image($property->term_id); ?>" />
                                        <div class="destination-info">
                                            <h2><?= esc_html($text) ?></h2>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="image | js-image">
            <img src="<?= $image ?>" />
            <div class="image-info">
                <h1><?= $imageTitle ?></h1>
                <p><?= $imageText ?></p>
            </div>
        </div>
    </div>
    <div class="community">
        <div class="subtitle | js-community">
            <h1><?= $titleCom ?></h1>
        </div>
        <div class="cards-com">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php if (have_rows('community')): ?>
                        <?php while (have_rows('community')): the_row();
                            $imageCom = get_sub_field('community_image');
                            $subtitleCom = get_sub_field('community_subtitle');
                            $textCom = get_sub_field('community_text');
                        ?>
                            <div class="swiper-slide">
                                <div class="card-com | js-community">
                                    <img
                                        src="<?= $imageCom ?>"
                                        alt="Card Image"
                                        class="card-com-image" />
                                    <div class="card-com-content">
                                        <h2 class="card-com-title"><?= $subtitleCom ?></h2>
                                        <div class="card-com-description">
                                            <p><?= $textCom ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>