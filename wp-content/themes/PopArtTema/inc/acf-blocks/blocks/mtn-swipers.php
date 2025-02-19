<?php

acf_register_block(array(
    'name'				=> 'mtn swipers',
    'title'				=> __('Mtn swipers'),
    'description'		=> __('A Mtn swipers block.'),
    'render_callback'	=> 'my_acf_block_render_callback',
    'category'			=> 'popart-blocks',
    'icon'				=> 'welcome-view-site', //change block icon
    'keywords'			=> array( 'mtn swipers', 'mtn swipers block' ),
    'mode'              => 'auto',
));

