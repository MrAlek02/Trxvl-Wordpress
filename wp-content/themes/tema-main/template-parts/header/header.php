<?php
    $header_logo = get_field("header_logo", "options");
?>

<header class="header | js-header">
    <div class="header__inner">
        <a href="<?php echo esc_url( home_url( "/" ) ); ?>" class="header__logo-link" aria-label="<?php echo esc_html__("Homepage link", THEME_NAME);?>">
            <?php if($header_logo) {
                acf_image($header_logo, "header__logo");
            } else {
                svg("logo");
            }?>
        </a>

        <div class="header__navigation-wrapper">
            <div class="header__navigation-wrapper-inner | js-navigation-wrapper">
                <nav class="header__navigation | js-navigation">
                    <?php wp_nav_menu( array(
                            "theme_location" => "Primary",
                            "menu_class"     => "primary-menu",
                            "container"      => false
                        ) ); ?>
                </nav>
            </div>
        </div>

        <button class="header__burger | js-hamburger"></button>
    </div>
</header>