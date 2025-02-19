<?php

function svg($name) {
    $path = THEME_DIR . '/src/images/svg/' . $name . '.svg';
    if(file_exists($path)){
        echo file_get_contents($path);
    }
}