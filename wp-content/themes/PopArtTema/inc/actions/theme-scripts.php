<?php

function theme_scripts()
{
    if (!VITE_BUILD) {
        $script_url_dev = VITE_LOCAL_URL . '/src/ts/main.ts';
        $vite_client = VITE_LOCAL_URL . '/@vite/client';

        wp_enqueue_script_module('script-vite', $vite_client, array(), null, true);
        wp_enqueue_script('theme-script', $script_url_dev, array(), null, true);
    } else {
        $manifest_path = THEME_DIR . '/dist/.vite/manifest.json';
        $manifest = json_decode(file_get_contents($manifest_path), true);
        $manifest_main_js = 'src/ts/main.ts';
        if (file_exists($manifest_path) && isset($manifest[$manifest_main_js])) {
            $main_js = $manifest[$manifest_main_js]['file'];
            $script_url_prod = THEME_URL . '/dist/' . $main_js;
            wp_enqueue_script('theme-script', $script_url_prod, array(), null, true);
        }
    }

    wp_localize_script('theme-script', 'globals', [
        'ajax_url' => admin_url('admin-ajax.php'),
    ]);
}

add_action('wp_enqueue_scripts', 'theme_scripts');
