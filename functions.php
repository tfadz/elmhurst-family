<?php
/**
 * Pensacola functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Elmhurst_Family
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.1.5' );
}

if ( ! function_exists( 'elmhurst_family_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function elmhurst_family_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Pensacola, use a find and replace
		 * to change 'elmhurst-family' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'elmhurst-family', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'elmhurst-family' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'elmhurst_family_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'elmhurst_family_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function elmhurst_family_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'elmhurst_family_content_width', 640 );
}
add_action( 'after_setup_theme', 'elmhurst_family_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function elmhurst_family_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'elmhurst-family' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'elmhurst-family' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'elmhurst_family_widgets_init' );

require get_template_directory() . '/inc/theme-styles.php';
require get_template_directory() . '/inc/theme-navigation.php';
require get_template_directory() . '/inc/theme-acf.php';
require get_template_directory() . '/inc/acf-blocks.php';


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/** Preload the first homepage hero image for the LCP request. */
function elmhurst_family_preload_home_hero() {
	if ( ! is_front_page() || ! function_exists( 'get_field' ) ) {
		return;
	}

	$front_page_id = (int) get_option( 'page_on_front' );
	$hero_slides   = get_field( 'hero_slider', $front_page_id );
	if ( empty( $hero_slides[0]['image'] ) ) {
		return;
	}

	$hero_image = $hero_slides[0]['image'];
	$hero_url   = is_array( $hero_image ) ? ( $hero_image['url'] ?? '' ) : wp_get_attachment_image_url( $hero_image, 'full' );
	if ( $hero_url ) {
		printf( "\n<link rel=\"preload\" as=\"image\" href=\"%s\" fetchpriority=\"high\">\n", esc_url( $hero_url ) );
	}
}
add_action( 'wp_head', 'elmhurst_family_preload_home_hero', 1 );

/** Load the remaining stacked Slick hero images after the page's load event. */
function elmhurst_family_defer_non_lcp_hero_images() {
	if ( ! is_front_page() ) {
		return;
	}
	wp_add_inline_script(
		'pensacola-scripts',
		'window.addEventListener("load",function(){document.querySelectorAll(".hero-slider .hero-img[data-src]").forEach(function(image){image.src=image.dataset.src;image.removeAttribute("data-src");});},{once:true});',
		'after'
	);
}
add_action( 'wp_enqueue_scripts', 'elmhurst_family_defer_non_lcp_hero_images', 20 );


add_action( 'wp_loaded', 'disable_wp_theme_update_loaded' );
function disable_wp_theme_update_loaded() {
    remove_action( 'load-update-core.php', 'wp_update_themes' );
    add_filter( 'pre_site_transient_update_themes', '__return_null' );
}

/** Add native lazy loading and dimensions to map embeds rendered from page content. */
function elmhurst_family_map_iframe_attributes( $content ) {
	return preg_replace_callback(
		'/<iframe\b[^>]*>/i',
		function ( $matches ) {
			$tag = $matches[0];
			if ( ! preg_match('/(?:snazzymaps\.com|google\.com\/maps)/i', $tag ) ) {
				return $tag;
			}
			if ( ! preg_match('/\sloading=/i', $tag ) ) {
				$tag = str_replace( '<iframe', '<iframe loading="lazy"', $tag );
			}
			if ( ! preg_match('/\swidth=/i', $tag ) ) {
				$tag = str_replace( '<iframe', '<iframe width="100%"', $tag );
			}
			if ( ! preg_match('/\sheight=/i', $tag ) ) {
				$tag = str_replace( '<iframe', '<iframe height="600"', $tag );
			}
			return $tag;
		},
		$content
	);
}
add_filter( 'the_content', 'elmhurst_family_map_iframe_attributes', 20 );



