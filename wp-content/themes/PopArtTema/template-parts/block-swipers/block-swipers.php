<?php
$titleCtg = get_field("categories_title");
$titleDes = get_field("destinations_title");
?>

<div class="categories-margin">
    <div class="container">
        <div class="hero-subtitle | js-categories">
            <h1><?= $titleCtg ?></h1>
        </div>
    </div>
    <div class="categories">
        <div class="swiper">
            <div class="swiper-wrapper">
                <?php
                $categories = get_terms([
                    'taxonomy' => 'category',
                    'hide_empty' => false
                ]);

                $excluded_categories = ['highlights'];
                $categories = array_filter($categories, function ($category) use ($excluded_categories) {
                    return !in_array($category->term_id, $excluded_categories) && !in_array($category->slug, $excluded_categories);
                });

                if (!empty($categories)): ?>
                    <?php foreach ($categories as $category):
                        $text = $category->name;
                        $link = get_term_link($category);
                    ?>
                        <div class="swiper-slide">
                            <div class="category | js-categories">
                                <a href="<?= esc_url($link) ?>">
                                    <img src="<?= get_taxonomy_image($category->term_id); ?>" alt="<?= esc_attr($text) ?>" />
                                    <?= esc_html($text) ?>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="hero-subtitle | js-destinations">
            <h1><?= $titleDes ?></h1>
        </div>
    </div>
    <div class="destinations">
        <div class="swiper">
            <div class="swiper-wrapper">
                <?php
                $query = new WP_Query([
                    'post_type' => 'post',
                    'posts_per_page' => -1,
                    'category_name'  => 'highlights',
                ]);

                if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();

                        $title = get_the_title(get_the_ID());
                        $img = get_the_post_thumbnail_url();
                ?>
                        <div class="swiper-slide margin-des">
                            <div class="destination | js-destinations">
                                <a href="#"><img src="<?= $img ?>" />
                                    <div class="destination-info">
                                        <h2><?= $title ?></h2>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endwhile;
                else: ?>
                    <p> TEST<?php _e('Sorry, no posts matched your criteria.'); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>