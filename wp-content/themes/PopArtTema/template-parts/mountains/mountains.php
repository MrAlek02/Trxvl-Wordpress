<?php
$term = get_queried_object(); // Get the current taxonomy term object
$title = get_field('title', 'category_' . $term->term_id);
$heroBg = get_field('hero_background', 'category_' . $term->term_id);

// Search Bar
$searchText = get_field('search_text', 'category_' . $term->term_id);
$search = get_field('search_image', 'category_' . $term->term_id);
$checkIn = get_field('check_in', 'category_' . $term->term_id);
$checks = get_field('checks_image', 'category_' . $term->term_id);
$checkOut = get_field('check_out', 'category_' . $term->term_id);
$person = get_field('person_image', 'category_' . $term->term_id);
$button = get_field('button', 'category_' . $term->term_id);

// Titles
$titleCtg = get_field('title_categories', 'category_' . $term->term_id);
$titleDes = get_field('title_destinations', 'category_' . $term->term_id);

// Recently posts
$postovi = get_field('posts', 'category_' . $term->term_id);
$titleRec = get_field('title_recently', 'category_' . $term->term_id);
$cardBg = get_field('bonanza_background', 'category_' . $term->term_id);
$titleBon = get_field('bonanza_title', 'category_' . $term->term_id);
$textBon = get_field('bonanza_text', 'category_' . $term->term_id);


// Packages posts
$packages = get_field('inclusive_packages', 'category_' . $term->term_id);
$titlePac = get_field('title_packages', 'category_' . $term->term_id);

// Honeymoons posts
$honeymoons = get_field('honeymoon', 'category_' . $term->term_id);
$titleHon = get_field('title_honeymoon', 'category_' . $term->term_id);

?>
<section class="block-hero">
    <div class="hero-bg" style="background-image: url(<?= $heroBg ?>)">
        <div class="container">
            <div class="title | js-hero">
                <?= $title ?>
            </div>
            <div class="search-bar | js-hero">
                <div class="search" style="background-image: url(<?= $search ?>)">
                    <input
                        class="search-input"
                        id="input-field"
                        type="search"
                        placeholder=""
                        required />
                    <label for="input-field"><?= $searchText ?? "Search" ?></label>
                </div>
                <div class="checks">
                    <?php
                    if ($checkIn) : ?>
                        <div class="check-cal" style="background-image: url(<?= $checks ?>)">
                            <input type="date" id="hiddenDate" />
                            <input
                                class="checkIn"
                                id="dateInput"
                                type="text"
                                placeholder="<?= $checkIn ?>" />
                        </div>
                    <?php endif; ?>
                    <div class="check-cal" style="background-image: url(<?= $checks ?>)">
                        <input type="date" id="hiddenDateSecond" />
                        <input
                            class="checkOut"
                            id="dateInputSecond"
                            type="text"
                            placeholder="<?= $checkOut ?>" />
                    </div>
                </div>
                <div class="persons-icon" style="background-image: url(<?= $person ?>)">
                    <?php if (have_rows('persons_select', 'category_' . $term->term_id)): ?>
                        <select name="persons" class="persons">
                            <?php while (have_rows('persons_select', 'category_' . $term->term_id)): the_row();
                                $value = get_sub_field('value');
                                $text = get_sub_field('select_text');
                            ?>
                                <option value="<?= $value ?>"><?= $text ?></option>
                            <?php endwhile; ?>
                        </select>
                    <?php endif; ?>
                </div>
                <button type="submit"><?= $button ?></button>
            </div>
        </div>
</section>

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
                    'taxonomy'   => 'category',
                    'hide_empty' => false
                ]);

                $excluded_categories = ['highlights'];
                $categories = array_filter($categories, function ($category) use ($excluded_categories) {
                    return !in_array($category->term_id, $excluded_categories) && !in_array($category->slug, $excluded_categories);
                });

                $current_category = get_queried_object();
                $current_category_id = $current_category->term_id ?? null;

                if ($current_category_id) {
                    usort($categories, function ($a, $b) use ($current_category_id) {
                        return ($a->term_id == $current_category_id) ? -1 : (($b->term_id == $current_category_id) ? 1 : 0);
                    });
                }

                if (!empty($categories)): ?>
                    <?php foreach ($categories as $category):
                        $text = $category->name;
                        $link = get_term_link($category);
                        $is_active = ($current_category_id == $category->term_id) ? 'active' : '';
                    ?>
                        <div class="swiper-slide <?= esc_attr($is_active) ?>">
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
                    <?php
                    $current_category = get_queried_object();

                    $query = new WP_Query([
                        'post_type'      => 'post',
                        'posts_per_page' => -1,
                        'cat'            => $current_category->term_id, // Fetch posts from the current category
                    ]);


                    if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
                            $post_id = get_the_ID();
                            $title = get_the_title(get_the_ID());
                            $img = get_the_post_thumbnail_url();
                            $rating = get_field('rating', $post_id);
                            $star = get_field('star', $post_id);
                            $stays = get_field('days_nights', $post_id);
                            $flightsText = get_field('flights_text', $post_id);
                            $flights = get_field('flights', $post_id);
                            $hotelsText = get_field('hotels_text', $post_id);
                            $hotels = get_field('hotels', $post_id);
                            $transfersText = get_field('transfers_text', $post_id);
                            $transfers = get_field('transfers', $post_id);
                            $activitiesText = get_field('activities_text', $post_id);
                            $activities = get_field('activities', $post_id);
                            $list = get_field('list', $post_id);
                            $priceText = get_field('price_text', $post_id);
                            $priceSaleText = get_field('price_sale_text', $post_id);
                            $per = get_field('per_person', $post_id);
                    ?>
                            <div class="swiper-slide">
                                <div class="card-mtn | js-destinations">
                                    <a href=" #">
                                        <img class="thumbnail" src="<?= $img ?>" alt="Alps" />
                                        <div class="card-mtn-content">
                                            <div class="mtn-title-row">
                                                <h2><?= $title ?></h2>
                                                <img src="<?= $star ?>" />
                                                <h2><?= $rating ?></h2>
                                            </div>
                                            <h3><?= $stays ?></h3>
                                            <div class="mtn-icons">
                                                <div class="mtn-icon">
                                                    <img src="<?= $flights ?>" />
                                                    <p><?= $flightsText ?></p>
                                                </div>
                                                <div class="mtn-icon">
                                                    <img src="<?= $hotels ?>" />
                                                    <p><?= $hotelsText ?></p>
                                                </div>
                                                <div class="mtn-icon">
                                                    <img src="<?= $transfers ?>" />
                                                    <p><?= $transfersText ?></p>
                                                </div>
                                                <div class="mtn-icon">
                                                    <img src="<?= $activities ?>" />
                                                    <p><?= $activitiesText ?></p>
                                                </div>
                                            </div>
                                            <ul><?= $list ?>
                                            </ul>
                                            <div class="mtn-price">
                                                <h3><?= $priceText ?></h3>
                                                <h2><?= $priceSaleText ?></h2>
                                                <p><?= $per ?></p>
                                            </div>
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
    <div class="recently">
        <div class="container">
            <h1 class="| js-recently"><?= $titleRec ?></h1>
        </div>
        <div class="recently-cards">
            <?php foreach ($postovi as $post) :
                setup_postdata($post);
                $post_id = get_the_ID();
                $title = get_the_title();
                $img = get_the_post_thumbnail_url();
                $rating = get_field('rating', $post_id);
                $star = get_field('star', $post_id);
                $stays = get_field('days_nights', $post_id);
                $flightsText = get_field('flights_text', $post_id);
                $flights = get_field('flights', $post_id);
                $hotelsText = get_field('hotels_text', $post_id);
                $hotels = get_field('hotels', $post_id);
                $transfersText = get_field('transfers_text', $post_id);
                $transfers = get_field('transfers', $post_id);
                $activitiesText = get_field('activities_text', $post_id);
                $activities = get_field('activities', $post_id);
                $list = get_field('list', $post_id);
                $priceText = get_field('price_text', $post_id);
                $priceSaleText = get_field('price_sale_text', $post_id);
                $per = get_field('per_person', $post_id);
            ?>
                <div class="card-mtn | js-recently">
                    <a href=" #">
                        <img class="thumbnail" src="<?= $img ?>" alt="Alps" />
                        <div class="card-mtn-content">
                            <div class="mtn-title-row">
                                <h2><?= $title ?></h2>
                                <img src="<?= $star ?>" />
                                <h2><?= $rating ?></h2>
                            </div>
                            <h3><?= $stays ?></h3>
                            <div class="mtn-icons">
                                <div class="mtn-icon">
                                    <img src="<?= $flights ?>" />
                                    <p><?= $flightsText ?></p>
                                </div>
                                <div class="mtn-icon">
                                    <img src="<?= $hotels ?>" />
                                    <p><?= $hotelsText ?></p>
                                </div>
                                <div class="mtn-icon">
                                    <img src="<?= $transfers ?>" />
                                    <p><?= $transfersText ?></p>
                                </div>
                                <div class="mtn-icon">
                                    <img src="<?= $activities ?>" />
                                    <p><?= $activitiesText ?></p>
                                </div>
                            </div>
                            <ul><?= $list ?>
                            </ul>
                            <div class="mtn-price">
                                <h3><?= $priceText ?></h3>
                                <h2><?= $priceSaleText ?></h2>
                                <p><?= $per ?></p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
            <div class="card-mtn card-bg | js-recently" style="background-image: url(<?= $cardBg ?>)">
                <h1><?= $titleBon ?></h1>
                <p><?= $textBon ?></p>
            </div>
        </div>
    </div>
    <div class="packages">
        <div class="container">
            <h1 class="| js-packages"><?= $titlePac ?></h1>
        </div>
        <div class="package">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($packages as $post) :
                        setup_postdata($post);
                        $post_id = get_the_ID();
                        $title = get_the_title();
                        $img = get_the_post_thumbnail_url();
                        $rating = get_field('rating', $post_id);
                        $star = get_field('star', $post_id);
                        $stays = get_field('days_nights', $post_id);
                        $flightsText = get_field('flights_text', $post_id);
                        $flights = get_field('flights', $post_id);
                        $hotelsText = get_field('hotels_text', $post_id);
                        $hotels = get_field('hotels', $post_id);
                        $transfersText = get_field('transfers_text', $post_id);
                        $transfers = get_field('transfers', $post_id);
                        $activitiesText = get_field('activities_text', $post_id);
                        $activities = get_field('activities', $post_id);
                        $list = get_field('list', $post_id);
                        $priceText = get_field('price_text', $post_id);
                        $priceSaleText = get_field('price_sale_text', $post_id);
                        $per = get_field('per_person', $post_id);
                    ?>
                        <div class="swiper-slide">
                            <div class="card-mtn | js-packages">
                                <a href=" #">
                                    <img class="thumbnail" src="<?= $img ?>" alt="Alps" />
                                    <div class="card-mtn-content">
                                        <div class="mtn-title-row">
                                            <h2><?= $title ?></h2>
                                            <img src="<?= $star ?>" />
                                            <h2><?= $rating ?></h2>
                                        </div>
                                        <h3><?= $stays ?></h3>
                                        <div class="mtn-icons">
                                            <div class="mtn-icon">
                                                <img src="<?= $flights ?>" />
                                                <p><?= $flightsText ?></p>
                                            </div>
                                            <div class="mtn-icon">
                                                <img src="<?= $hotels ?>" />
                                                <p><?= $hotelsText ?></p>
                                            </div>
                                            <div class="mtn-icon">
                                                <img src="<?= $transfers ?>" />
                                                <p><?= $transfersText ?></p>
                                            </div>
                                            <div class="mtn-icon">
                                                <img src="<?= $activities ?>" />
                                                <p><?= $activitiesText ?></p>
                                            </div>
                                        </div>
                                        <ul><?= $list ?>
                                        </ul>
                                        <div class="mtn-price">
                                            <h3><?= $priceText ?></h3>
                                            <h2><?= $priceSaleText ?></h2>
                                            <p><?= $per ?></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="honeymoons">
        <div class="container">
            <h1 class="| js-honeymoon"><?= $titleHon ?></h1>
        </div>
        <div class="honeymoon">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($honeymoons as $post) :
                        setup_postdata($post);
                        $post_id = get_the_ID();
                        $title = get_the_title();
                        $img = get_the_post_thumbnail_url();
                        $rating = get_field('rating', $post_id);
                        $star = get_field('star', $post_id);
                        $stays = get_field('days_nights', $post_id);
                        $flightsText = get_field('flights_text', $post_id);
                        $flights = get_field('flights', $post_id);
                        $hotelsText = get_field('hotels_text', $post_id);
                        $hotels = get_field('hotels', $post_id);
                        $transfersText = get_field('transfers_text', $post_id);
                        $transfers = get_field('transfers', $post_id);
                        $activitiesText = get_field('activities_text', $post_id);
                        $activities = get_field('activities', $post_id);
                        $list = get_field('list', $post_id);
                        $priceText = get_field('price_text', $post_id);
                        $priceSaleText = get_field('price_sale_text', $post_id);
                        $per = get_field('per_person', $post_id);
                    ?>
                        <div class="swiper-slide">
                            <div class="card-mtn | js-honeymoon">
                                <a href=" #">
                                    <img class="thumbnail" src="<?= $img ?>" alt="Alps" />
                                    <div class="card-mtn-content">
                                        <div class="mtn-title-row">
                                            <h2><?= $title ?></h2>
                                            <img src="<?= $star ?>" />
                                            <h2><?= $rating ?></h2>
                                        </div>
                                        <h3><?= $stays ?></h3>
                                        <div class="mtn-icons">
                                            <div class="mtn-icon">
                                                <img src="<?= $flights ?>" />
                                                <p><?= $flightsText ?></p>
                                            </div>
                                            <div class="mtn-icon">
                                                <img src="<?= $hotels ?>" />
                                                <p><?= $hotelsText ?></p>
                                            </div>
                                            <div class="mtn-icon">
                                                <img src="<?= $transfers ?>" />
                                                <p><?= $transfersText ?></p>
                                            </div>
                                            <div class="mtn-icon">
                                                <img src="<?= $activities ?>" />
                                                <p><?= $activitiesText ?></p>
                                            </div>
                                        </div>
                                        <ul><?= $list ?>
                                        </ul>
                                        <div class="mtn-price">
                                            <h3><?= $priceText ?></h3>
                                            <h2><?= $priceSaleText ?></h2>
                                            <p><?= $per ?></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>