<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Elmhurst_Family
 */

get_header();
?>
<main id="primary" class="site-main">
    <figure class="site-main-bg">
        <?php $bg_thumb = get_the_post_thumbnail_url(get_the_ID(),'full');  ?>
        <?php if($bg_thumb) : ?>
            <?php the_post_thumbnail('full'); ?>
        <?php else : ?>
            <img src="<?php bloginfo('template_directory'); ?>/images/bg-placeholder.jpg" alt="">
        <?php endif; ?>
    </figure>
    
    <div class="site-main-wrapper">
        <div class="container" data-aos="fade-up"data-aos-offset="-200">
            <?php if (!is_home()) : ?>
                <div class="page-title">
                    <div class="row">
                        <div class="col">
                            <h1><?php the_title(); ?></h1>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-sm-12">
                    <?php
                    while (have_posts()) :
                        the_post();
                        get_template_part('template-parts/content', 'page');
                    endwhile; // End of the loop.
                    ?>
                </div>
            </div>
        </div>
    </div>
</main><!-- #main -->
<?php
get_footer();
