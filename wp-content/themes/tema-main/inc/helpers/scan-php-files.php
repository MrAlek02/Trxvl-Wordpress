<?php

function scan_php_files($dir) {

    $file_list = [];

    $files = scandir($dir);
    $files = array_splice($files, 2);

    foreach ($files as $file) {

        if (strpos($file, '.php') !== false) {

            $file_list[] = $dir . '/' . $file;

        } else if (is_dir($dir . '/' . $file)) {

            $file_list = array_merge($file_list, scan_php_files($dir . '/' . $file));

        }

    }

    return $file_list;
}