<?php

acf_register_block(array(
    'name'				=> 'hero',
    'title'				=> __('Hero'),
    'description'		=> __('A Hero block.'),
    'render_callback'	=> 'my_acf_block_render_callback',
    'category'			=> 'popart-blocks',
    'icon'				=> 'welcome-view-site', //change block icon
    'keywords'			=> array( 'hero', 'hero block' ),
    'mode'              => 'auto',
));


