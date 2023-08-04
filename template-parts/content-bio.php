<?php
/**
* Template part for displaying posts
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package Elmhurst_Family
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <div class="backto">
        <a href="<?php echo home_url(); ?>/our-team"><i class="far fa-long-arrow-left"></i> Back to team</a>
    </div>
    <h3 class="staff-title">Team Member</h3>
    <?php
    if ( is_singular() ) :
        the_title( '<h1 class="entry-title">', '</h1>' );
        else :
            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
        endif;
        if ( 'post' === get_post_type() ) :
            ?>
        <?php endif; ?>
        <div class="entry-content">
            <figure class="staff-thumb">
                <?php elmhurst_family_post_thumbnail(); ?>
            </figure>
            
            <div class="staff-main">
                    
        
            <?php
            the_content(
                sprintf(
                    wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'elmhurst-family' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    wp_kses_post( get_the_title() )
                    )
                );
                
                wp_link_pages(
                    array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'elmhurst-family' ),
                        'after'  => '</div>',
                    )
                );
                ?>
                </div>
            </div><!-- .entry-content -->
        </article><!-- #post-<?php the_ID(); ?> -->
