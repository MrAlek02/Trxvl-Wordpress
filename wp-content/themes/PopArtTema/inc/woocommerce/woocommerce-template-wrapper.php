<?php

if ( ! function_exists( 'theme_woocommerce_wrapper_before' ) ) {

	function theme_woocommerce_wrapper_before() { 	?>

		<main id="main" class="main">

    <?php }
}

add_action( 'woocommerce_before_main_content', 'theme_woocommerce_wrapper_before' );

if ( ! function_exists( 'theme_woocommerce_wrapper_after' ) ) {

	function theme_woocommerce_wrapper_after() { ?>

    </main>

	<?php }
}

add_action( 'woocommerce_after_main_content', 'theme_woocommerce_wrapper_after' );