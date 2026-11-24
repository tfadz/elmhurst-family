<?php

/**
* Enqueue scripts and styles.
*/
function elmhurst_family_scripts() {
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap-grid.min.css', array(), '4.6.0' );
    wp_enqueue_style( 'pensacola-style', get_stylesheet_uri(), array(), _S_VERSION );
    wp_enqueue_style( 'aos', get_template_directory_uri() . '/assets/css/aos.css', array(), '2.3.4' );
    wp_enqueue_style( 'elmhurst-fonts', get_template_directory_uri() . '/assets/css/fonts.css', array(), '1.0.0' );

    wp_style_add_data( 'pensacola-style', 'rtl', 'replace' );

    wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.js', array( 'jquery' ), '2', true );
    wp_enqueue_script( 'aos', get_template_directory_uri() . '/js/aos.js', array(), '2', true );
    wp_enqueue_script( 'pensacola-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'pensacola-scripts', get_template_directory_uri() . '/js/theme.js', array( 'jquery' ), '2', true );


    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'elmhurst_family_scripts' );


// Add Gutenberg alignment options
add_theme_support( 'align-wide' );


// Move Yoast to bottom
function yoasttobottom() {
    return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');

// Add logo to Login Screen

function my_login_logo() {
	$logo_id = get_theme_mod( 'custom_logo' );
	$image   = $logo_id ? wp_get_attachment_image_src( $logo_id, 'full' ) : false;

	if ( ! $image ) {
		return;
	}
	?>
	<style type="text/css">
		#login h1 a, .login h1 a {
			background-image: url("<?php echo esc_url( $image[0] ); ?>");
			background-position: center;
			background-repeat: no-repeat;
			background-size: contain;
			height: 150px;
			max-width: 100%;
			padding-bottom: 1rem;
			width: auto;
		}
	</style>
	<?php
}
add_action( 'login_enqueue_scripts', 'my_login_logo' );
?>