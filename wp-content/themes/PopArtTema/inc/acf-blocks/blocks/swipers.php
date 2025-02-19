<?php

acf_register_block(array(
    'name'				=> 'swipers',
    'title'				=> __('Swipers'),
    'description'		=> __('A Swipers block.'),
    'render_callback'	=> 'my_acf_block_render_callback',
    'category'			=> 'popart-blocks',
    'icon'				=> 'welcome-view-site', //change block icon
    'keywords'			=> array( 'swipers', 'swipers block' ),
    'mode'              => 'auto',
));
