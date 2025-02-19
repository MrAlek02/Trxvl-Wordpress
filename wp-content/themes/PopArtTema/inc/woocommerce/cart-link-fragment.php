<?php

if ( ! function_exists( 'theme_woocommerce_cart_link_fragment' ) ) {
	
    function theme_woocommerce_cart_link_fragment( $fragments ) {

        ob_start();
        theme_woocommerce_cart_link();
        $fragments['a.cart-contents'] = ob_get_clean();
    
        return $fragments;
        
    }
}

add_filter( 'woocommerce_add_to_cart_fragments', 'theme_woocommerce_cart_link_fragment' );
    
if ( ! function_exists( 'theme_woocommerce_cart_link' ) ) {
    
    function theme_woocommerce_cart_link() { ?>

    <a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'theme' ); ?>">

        <?php
            $item_count_text = sprintf(
                _n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'theme' ),
                WC()->cart->get_cart_contents_count()
            );
        ?>

        <span class="amount"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span>
        <span class="count"><?php echo esc_html( $item_count_text ); ?></span> 

    </a>

    <?php }
}
    
if ( ! function_exists( 'theme_woocommerce_header_cart' ) ) {
    function theme_woocommerce_header_cart() {

        $class = is_cart() ? 'current-menu-item' : '';
        
    ?>

    <ul id="site-header-cart" class="site-header-cart">
        <li class="<?php echo esc_attr( $class ); ?>">
            <?php theme_woocommerce_cart_link(); ?>
        </li>
        <li>
            <?php
                    $instance = array(
                        'title' => '',
                    );
        
                    the_widget( 'WC_Widget_Cart', $instance );?>
        </li>
    </ul>

<?php }
}