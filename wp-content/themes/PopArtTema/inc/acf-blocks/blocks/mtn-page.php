<?php

acf_register_block(array(
    'name'				=> 'mtn page',
    'title'				=> __('Mtn page'),
    'description'		=> __('A Mtn page block.'),
    'render_callback'	=> 'my_acf_block_render_callback',
    'category'			=> 'popart-blocks',
    'icon'				=> 'welcome-view-site', //change block icon
    'keywords'			=> array( 'mtn ', 'mtn swipers block' ),
    'mode'              => 'auto',
));