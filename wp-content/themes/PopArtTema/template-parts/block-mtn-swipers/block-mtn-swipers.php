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
    <div class="destinations-mtn">
        <div class="hero-subtitle | js-destinations">
            <h1><?= $titleDes ?></h1>
        </div>
        <div class="destination-mtn">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php if (have_rows('destinations')): ?>
                        <?php while (have_rows('destinations')): the_row();
                            $imageMtn = get_sub_field('destination_image');
                            $titleMtn = get_sub_field('destination_title');
                            $rating = get_sub_field('stars_rating');
                            $starMtn = get_sub_field('stars_image');
                            $subtitleMtn = get_sub_field('destination_subtitle');
                            $price = get_sub_field('destination_price');
                            $salePrice = get_sub_field('destination_sales_price');
                        ?>
                            <div class="swiper-slide">
                                <div class="card-mtn | js-destinations">
                                    <a href="#">
                                        <img src="<?= $imageMtn ?>" alt="Alps" />
                                        <div class="card-mtn-content">
                                            <div class="mtn-title-row">
                                                <h2><?= $titleMtn ?></h2>
                                                <img src="<?= $starMtn ?>" />
                                                <h2><?= $rating ?></h2>
                                            </div>
                                            <h3><?= $subtitleMtn ?></h3>
                                            <div class="mtn-icons">
                                                <?php if (have_rows('services')): ?>
                                                    <?php while (have_rows('services')): the_row();
                                                        $imageSvc = get_sub_field('service_image');
                                                        $textSvc = get_sub_field('service_text');
                                                    ?>
                                                        <div class="mtn-icon">
                                                            <img src="<?= $imageSvc ?>" />
                                                            <p><?= $textSvc ?></p>
                                                        </div>
                                                    <?php endwhile; ?>
                                                <?php endif; ?>
                                            </div>
                                            <ul>
                                                <li>Tour combo with return airport transfer</li>
                                                <li>City Tour</li>
                                                <li>Curious Corner</li>
                                            </ul>
                                            <div class="mtn-price">
                                                <h3><?= $price ?></h3>
                                                <h2><?= $salePrice ?></h2>
                                                <p>Per person</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>