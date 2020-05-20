<?php
/**
 * Starter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package strt
 */


if ( ! defined( 'STRT_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'STRT_VERSION', '1.0.0' );
}

if ( ! function_exists( 'strt_setup' ) ) :
	function strt_setup() {
		load_theme_textdomain( 'strt', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'customize-selective-refresh-widgets' );
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

		// Soil plugin config
		add_theme_support('soil-clean-up');
		add_theme_support('soil-disable-rest-api');
		add_theme_support('soil-disable-asset-versioning');
		add_theme_support('soil-disable-trackbacks');
		add_theme_support('soil-js-to-footer');
		add_theme_support('soil-nav-walker');
		add_theme_support('soil-nice-search');
		add_theme_support('soil-relative-urls');
		// add_theme_support('soil-google-analytics', 'UA-XXXXX-Y');

		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'strt' ),
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'strt_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function strt_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'strt_content_width', 640 );
}
add_action( 'after_setup_theme', 'strt_content_width', 0 );

/**
 * Remove inline width from caption shortcode
 */
add_filter('img_caption_shortcode_width', '__return_false');

/**
 * Register widget area.
 */
function strt_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'strt' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'strt' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'strt_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function strt_scripts() {
	wp_deregister_script('jquery');
	wp_register_script('jquery', "https://code.jquery.com/jquery-2.2.4.min.js", array(), null);

	wp_enqueue_style( 'strt-stylesheet', get_stylesheet_directory_uri() . '/dist/css/bundle.css', array(), STRT_VERSION );

	wp_enqueue_script( 'strt-scripts', get_template_directory_uri() . '/dist/js/bundle.js', array( 'jquery' ), STRT_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'strt_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
