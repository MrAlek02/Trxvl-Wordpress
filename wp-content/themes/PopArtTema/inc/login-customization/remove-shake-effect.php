<?php

function wpb_remove_loginshake() {
    remove_action('login_footer', 'wp_shake_js', 12);
}
add_action('login_footer', 'wpb_remove_loginshake');