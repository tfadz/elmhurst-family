<?php
/**
* The template for displaying the footer
*
* Contains the closing of the #content div and all content after.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
*/

?>

<footer id="colophon" class="footer">
    <div class="container">
        <div class="row footer-row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-2">
                        <img width="90" src="<?php bloginfo('template_directory'); ?>/images/elmhurst-logo-tree.svg" alt="">
                    </div>
                    <div class="col-md-10">
                        <div class="row no-gutters">
                        <div class="col-md-6 footer-location">
                            <div>
                                <h6><strong>Elmhurst Family Dentistry</strong></h6>
                                <p style="margin-bottom:3px;">360 W. Butterfield Rd. <br />Ste 180<br /> Elmhurst, Illinois</p>
                                <p>(630) 832-3120</p>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="footer-hours">
                                <ul>
                                    <li>Monday: <span>9am&#8212;6pm</span></li>
                                    <li>Tuesday: <span>9am&#8212;7pm</span></li>
                                    <li>Wednesday: <span>9am&#8212;8pm</span></li>
                                    <li>Thursday: <span>9am&#8212;5pm</span></li>
                                    <li>Friday: <span>9am&#8212;2pm</span></li>
                                    <li>Saturday: <span>8am&#8212;1pm</span></li>
                                    <li>Sunday: <span>Closed</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                        
                        
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="footer-branding">
                    <?php wp_nav_menu(array( 'theme_location' => 'footer-menu', 'container_class' => 'footer-menu' )); ?>
                </div>
                <!-- <div class="row no-gutters">
                    <div class="col-md-6 footer-location">
                        <div>
                            <h6><strong>Elmhurst Family Dentistry</strong></h6>
                            <p style="margin-bottom:3px;">360 W. Butterfield Rd., Ste 180<br /> Elmhurst, Illinois</p>
                            <p>(630) 832-3120</p>
                        </div>
                    </div>
                    
                </div> -->
            </div>
        </div>
    </div>
    <div class="footer-sub">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="footer-info">
                        <?php echo get_bloginfo(); ?> &copy;<?php echo date('Y'); ?> 
                    </div>
                </div>
                <div class="col-md-6">
                    <ul class="footer-sub-social">
                        <li><a target="_blank" href="https://www.facebook.com/elmhurstfamilydentistry"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a target="_blank" href="https://www.yelp.com/biz/elmhurst-family-dentistry-elmhurst"><i class="fab fa-yelp"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
</footer>

<?php wp_footer(); ?>

</body>
</html>
