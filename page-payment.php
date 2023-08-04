<?php /* Template Name: Payment */ ?>
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
                    <div id="payment-widget-container" style="width: 100%; height: 630px"></div><script src='https://payments.lh360.com/assets/widget.js'></script><script>window.Payment.initialize({embedContainer: 'payment-widget-container',accountId: 'cchsv9t4qht2h3jkqbr5gd3hd6jtjbnuhp21kke07p0qsovctmbit39fn1gjgare', callbacks: { capture: function (event) { console.log(event); },error: function (event) { console.log(event); }}});</script>
                    
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
</main>
<?php
get_footer();
