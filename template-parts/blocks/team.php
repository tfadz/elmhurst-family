<section class="team" id="our-team">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="team-info" data-aos="fade-up" data-aos-offset="-200">
                    <div class="team-info-marker"></div>
                    <div><?php the_field('team_info'); ?></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="team-slider__slick-arrows desktop" data-aos="fade-up" data-aos-offset="-250">
                    <button class="prev-slide"></button>
                    <button class="next-slide"></button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-right" data-aos="fade-up" data-aos-offset="-100">
        <div class="row">
            <div class="col">
                <div class="team-slider">
                    <?php $team_posts = get_field('team'); ?>
                    <?php if( $team_posts ): ?>
                        <?php foreach( $team_posts as $p ): ?>
                            <a class="member" href="<?php the_permalink($p->ID); ?>">
                                <?php $featured_img_url = get_the_post_thumbnail_url($p->ID,'medium_large'); ?>
                                <div class="featured-img"><img src="<?php echo $featured_img_url ?>" alt=""></div>
                                <h3><?php echo get_the_title( $p->ID ); ?></h3>
                            </a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="team-slider__slick-arrows mobile">
                    <button class="prev-slide"></button>
                    <button class="next-slide"></button>
                </div>
            </div>
        </div>
    </div>
</section>