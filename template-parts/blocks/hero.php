<section class="hero">
    <div class="hero-slider">
        <?php
        $hero_slide_index = 0;
        if (have_rows('hero_slider')) :
            while (have_rows('hero_slider')) :
                the_row();
                $heroimg = get_sub_field('image');
                if ($heroimg) :
                    $hero_slide_index++;
                    $hero_url    = is_array($heroimg) ? ($heroimg['url'] ?? '') : wp_get_attachment_image_url($heroimg, 'full');
                    $hero_width  = is_array($heroimg) ? absint($heroimg['width'] ?? 0) : 0;
                    $hero_height = is_array($heroimg) ? absint($heroimg['height'] ?? 0) : 0;
                    if ($hero_url) :
                        ?>
                        <img class="hero-img" <?php echo 1 === $hero_slide_index ? 'src="' . esc_url($hero_url) . '" loading="eager" fetchpriority="high" decoding="sync"' : 'data-src="' . esc_url($hero_url) . '" loading="lazy" decoding="async"'; ?> alt=""<?php echo $hero_width ? ' width="' . esc_attr($hero_width) . '"' : ''; ?><?php echo $hero_height ? ' height="' . esc_attr($hero_height) . '"' : ''; ?>>
                        <?php
                    endif;
                endif;
            endwhile;
        endif;
        ?>
    </div>
    <div class="hero-content">

            <div class="hero-main">

                <div class="hero-main-content">
                    <?php if (get_field('hero_title')) :  ?><div class="title"><h1><?php the_field('hero_title') ?></h1></div><?php endif; ?>
                    <?php if (get_field('hero_text')) :  ?><div class="content"><?php the_field('hero_text') ?></div><?php endif; ?>
                    <!-- <a data-aos="fade-up" data-aos-delay="500" data-aos-offset="-300" href="#patient-forms" class="button">Learn More About Patient Care <i class="fal fa-heart-circle"></i></a> -->
                </div>

            </div>
    </div>
</section>
