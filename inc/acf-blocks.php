<?php
// ACF Blocks

function acf_blocks_init()
{

    acf_register_block_type(array(
        'name'              => 'hero_slider',
        'title'             => __('Hero'),
        'render_template'   => '/template-parts/blocks/hero.php',
		'mode' => 'edit',
        'icon' => file_get_contents( get_template_directory() . '/images/elmhurst-logo-tree.svg' ),

    ));
    
    acf_register_block_type(array(
        'name'              => 'team',
        'title'             => __('Team'),
        'render_template'   => '/template-parts/blocks/team.php',
		'mode' => 'edit',
        'icon' => file_get_contents( get_template_directory() . '/images/elmhurst-logo-tree.svg' ),

    ));
    
    acf_register_block_type(array(
        'name'              => 'cards',
        'title'             => __('Cards'),
        'render_template'   => '/template-parts/blocks/cards.php',
		'mode' => 'edit',
        'icon' => file_get_contents( get_template_directory() . '/images/elmhurst-logo-tree.svg' ),

    ));


}
// Check if function exists and hook into setup.
if (function_exists('acf_register_block_type')) {
    add_action('acf/init', 'acf_blocks_init');
}


