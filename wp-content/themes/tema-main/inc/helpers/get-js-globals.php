<?php

add_filter('js-globals', function($globals) {
    return array_merge($globals, [
        'ajax_url' => admin_url('admin-ajax.php'),
        'home_url' => home_url('/'),
    ]);
});

function get_js_globals() {
    return htmlspecialchars(json_encode(
        (object) apply_filters('js-globals', []),
        JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
    ));
}