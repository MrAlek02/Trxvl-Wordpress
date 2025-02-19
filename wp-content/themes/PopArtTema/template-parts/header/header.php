<?php
$header_logo = get_field("header_logo", "options");
?>

<header class="header | js-header">
    <div class="header__inner">
        <a href="<?php echo esc_url(home_url("/")); ?>" class="header__logo-link" aria-label="<?php echo esc_html__("Homepage link", THEME_NAME); ?>">
            <img src="<?= ($header_logo) ?>">
        </a>

        <div class="header__navigation-wrapper">
            <div class="header__navigation-wrapper-inner | js-navigation-wrapper">
                <?php
                wp_nav_menu([
                    'menu' => 'myMenu',
                    'theme_location' => 'primary',
                    'menu_class' => 'header__menu',
                ]);
                ?>
            </div>
        </div>


        <button class="header__burger | js-hamburger"></button>
    </div>
</header>