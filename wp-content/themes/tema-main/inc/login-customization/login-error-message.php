<?php

function theme_error_message() {
	return 'Wrong username or password.';
}
add_filter( 'login_errors', 'theme_error_message' );