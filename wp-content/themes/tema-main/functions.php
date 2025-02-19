<?php
/**
 * Functions and definitions
 */

define( 'THEME_NAME', 'PopArtTheme' );
define( 'THEME_DIR', get_template_directory() );
define( 'THEME_URL', get_template_directory_uri() );
define( 'TEMPLATE_DIR', THEME_DIR . '/templates' );
define( 'PUBLIC_DIR', THEME_DIR . '/public' );
define( 'PUBLIC_URL', THEME_URL . '/public' );

// require_once THEME_DIR . '/vendor/autoload.php';

require_once THEME_DIR . '/inc/login-customization/index.php';
require_once THEME_DIR . '/inc/ajax/index.php';
require_once THEME_DIR . '/inc/filters/index.php';
require_once THEME_DIR . '/inc/actions/index.php';
require_once THEME_DIR . '/inc/remove-junk-from-header/index.php';
require_once THEME_DIR . '/inc/helpers/index.php';
require_once THEME_DIR . '/inc/acf-blocks/index.php';
// require_once THEME_DIR . '/inc/woocommerce/index.php';

// new \PopArt\Demo\Demo();
