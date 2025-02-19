<?php

function theme_add_login_title() {
	echo '<span class="login-title">Login</span>';
}
add_action( 'login_form', 'theme_add_login_title' );