<?php
/**
* The template for displaying all single posts
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*
* @package Elmhurst_Family
*/

get_header();
?>

<main id="primary" class="site-main">
    <figure class="site-main-bg">
        <img src="<?php bloginfo('template_directory'); ?>/images/bg-placeholder.jpg" alt="">
    </figure>
    <div class="site-main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <?php
                    while ( have_posts() ) :
                        the_post();
                        
                        get_template_part( 'template-parts/content-bio', get_post_type() );
                        
                        // the_post_navigation(
                        //   array(
                        //     'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'elmhurst-family' ) . '</span> <span class="nav-title">%title</span>',
                        //     'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'elmhurst-family' ) . '</span> <span class="nav-title">%title</span>',
                        //   )
                        // );
                        
                    endwhile; // End of the loop.
                    ?>
                    
                </div>
            </div>
        </div>
        
    </div>
    
</main><!-- #main -->

<?php
get_footer();
