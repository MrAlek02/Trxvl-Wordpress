<?php
$recentlyTitle = get_field("recently_title");
$recentlyImage = get_field("recently_image");
$recentlyText = get_field("recently_text");
$recenlyInfo = get_field("recently_info");
?>


<div class="recently">
    <div class="container recently-title">
        <h1 class="| js-recently"><?= $recentlyTitle ?></h1>
    </div>
    <div class="recently-cards">
        <?php if (have_rows('recently')): ?>
            <?php while (have_rows('recently')): the_row();
                $imageMtn = get_sub_field('recently_image');
                $titleMtn = get_sub_field('recently_title');
                $rating = get_sub_field('stars_rating');
                $starMtn = get_sub_field('stars_image');
                $subtitleMtn = get_sub_field('recently_subtitle');
                $price = get_sub_field('recently_price');
                $salePrice = get_sub_field('recently_sales_price');
            ?>
                <div class="card-mtn | | js-recently">
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
            <?php endwhile; ?>
        <?php endif; ?>
        <div class="card-mtn card-bg | js-recently" style="background-image: url(<?= $recentlyImage ?>)">
            <h1><?= $recenlyInfo ?></h1>
            <p><?= $recentlyText ?></p>
        </div>
    </div>
</div>