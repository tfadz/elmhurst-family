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
        <div class="container">
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
                        <div class="col-6 col-lg-3" id="post-<?php the_ID(); ?>">
                            <a href="<?php the_permalink(); ?>" class="member">
                                <?php $featured_img_id = get_post_thumbnail_id(); ?>
                                <?php if($featured_img_id) : ?>
                                    <figure class="member-img">
                                        <?php echo wp_get_attachment_image( $featured_img_id, 'medium_large', false, array( 'loading' => 'lazy', 'decoding' => 'async' ) ); ?>
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
