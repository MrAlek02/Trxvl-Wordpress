<?php

acf_register_block(array(
    'name'				=> 'app',
    'title'				=> __('App'),
    'description'		=> __('A App block.'),
    'render_callback'	=> 'my_acf_block_render_callback',
    'category'			=> 'popart-blocks',
    'icon'				=> 'welcome-view-site', //change block icon
    'keywords'			=> array( 'app', 'app block' ),
    'mode'              => 'auto',
));
