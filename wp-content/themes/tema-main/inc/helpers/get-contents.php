<?php

function get_contents($url) {
    $newUrl = str_replace(content_url(), WP_CONTENT_DIR, $url);
    return file_get_contents($newUrl);
}