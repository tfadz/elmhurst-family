<?php
/**
* The template for displaying 404 pages (not found)
*
* @link https://codex.wordpress.org/Creating_an_Error_404_Page
*
* @package Elmhurst_Family
*/

get_header();
?>

<main id="primary" class="site-main">
    <figure class="site-main-bg">
        <?php elmhurst_family_post_thumbnail(); ?>
    </figure>
    
    <div class="site-main-wrapper error-404 not-found">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <header class="page-header">
                            <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'elmhurst-family' ); ?></h1>
                        </header><!-- .page-header -->
                        
                        <div class="page-content">
                            <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'elmhurst-family' ); ?></p>
                            
                            <?php
                            get_search_form();
                            ?>
                            
                        </div><!-- .page-content -->
                </div>
            </div>
        </div>
        
    </div>
    
</main><!-- #main -->

<?php
get_footer();
