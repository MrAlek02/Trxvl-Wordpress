<?php

acf_register_block(array(
    'name'                => 'page',
    'title'                => __('Page'),
    'description'        => __('A Page block.'),
    'render_callback'    => 'my_acf_block_render_callback',
    'category'            => 'popart-blocks',
    'icon'                => 'welcome-view-site', //change block icon
    'keywords'            => array('page', 'page block'),
    'mode'              => 'auto',
));
