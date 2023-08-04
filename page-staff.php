<?php /* Template Name: Staff */ ?>
<?php get_header(); ?>
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
            <div class="row">
                <div class="col">
                    <h1>Our Team</h1>
                </div>
            </div>
            <?php 
            $args = array(
                'post_type' => 'staff',
                'posts_per_page' => -1,
                'order' => 'ASC',
            );
            $query = new WP_Query( $args ); ?>
            <div class="row">
                <?php if ( $query->have_posts() ) : ?>
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                        <div class="col-sm-6 col-lg-4" id="post-<?php the_ID(); ?>">
                            <a href="<?php the_permalink(); ?>" class="member">
                                <?php $featured_img_url = get_the_post_thumbnail_url(); ?>
                                <?php if($featured_img_url) : ?>
                                    <figure class="member-img">
                                        <img src="<?php echo $featured_img_url ?>" alt="">
                                    </figure>
                                <?php endif; ?>
                                <h3><?php the_title(); ?></h3>
                             </a>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php else : ?>
                    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>
<?php
get_footer();
