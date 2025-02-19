<?php
$footerLogo = get_field("footer_logo", 'option');
$buttonText = get_field("button_text", 'option');
?>
<footer>
    <div class="container">
        <div class="footer">
            <div class="footer-left">
                <div class="footer-logo">
                    <h1><?= $footerLogo ?></h1>
                </div>
            </div>
            <?php if (have_rows('footer_menus', 'option')) : ?>
                <div class="footer-menus">
                    <?php while (have_rows('footer_menus', 'option')) : the_row(); ?>
                        <div class="footer-menu">
                            <ul>
                                <?php if (have_rows('menu_items')) : ?>
                                    <?php while (have_rows('menu_items')) : the_row();
                                        $itemText = get_sub_field('menu_item_text');
                                        $itemLink = get_sub_field('menu_item_link');
                                    ?>
                                        <li><a href="<?php echo ($itemLink); ?>"><?php echo ($itemText); ?></a></li>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="footer-down">
            <div class="footer-btn">
                <button><?= $buttonText ?></button>
            </div>
            <?php if (have_rows('footer_social', 'option')): ?>
                <div class="footer-social">
                    <?php while (have_rows('footer_social', 'option')): the_row();
                        $socialLink = get_sub_field('social_link');
                        $socialImage = get_sub_field('social_image');
                    ?>
                        <a href="<?php echo ($socialLink); ?>">
                            <img src="<?php echo ($socialImage['url']); ?>" alt="<?php echo ($socialImage['alt']); ?>" />
                        </a>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>

        </div>
        <div class="footer-copyright">
            <p class="footer__popart"><?php get_signature(); ?></p>
        </div>
    </div>
</footer>
<?php if (have_rows('navbar', 'option')): ?>
    <div class="mobile-menu">
        <?php while (have_rows('navbar', 'option')): the_row();
            $link = get_sub_field('link');
            $image = get_sub_field('image');
            $text = get_sub_field('text');
            $current_class = ($link == get_permalink()) ? 'active' : '';
        ?>
            <a href="<?= $link ?>" class="<?= $current_class ?>">
                <img src="<?= $image ?>" alt="<?= $text ?>" />
                <?= $text ?>
            </a>
        <?php endwhile; ?>
    </div>
<?php endif; ?>