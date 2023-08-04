<?php
// ACF Blocks

function acf_blocks_init()
{

    acf_register_block_type(array(
        'name'              => 'hero_slider',
        'title'             => __('Hero'),
        'render_template'   => '/template-parts/blocks/hero.php',
        'icon' => 'format-aside',
		'mode' => 'edit',
    ));
    
    acf_register_block_type(array(
        'name'              => 'team',
        'title'             => __('Team'),
        'render_template'   => '/template-parts/blocks/team.php',
        'icon' => 'format-aside',
		'mode' => 'edit',
    ));


}
// Check if function exists and hook into setup.
if (function_exists('acf_register_block_type')) {
    add_action('acf/init', 'acf_blocks_init');
}


