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
		// add_theme_support('soil-disable-asset-versioning');
		add_theme_support('soil-disable-trackbacks');
		add_theme_support('soil-js-to-footer');
		add_theme_support('soil-nav-walker');
		add_theme_support('soil-nice-search');
		add_theme_support('soil-relative-urls');
		// add_theme_support('soil-google-analytics', 'UA-XXXXX-Y');

		register_nav_menus(
			array(
				'primary_navigation' => esc_html__( 'Primary', 'strt' ),
				'social' => __('Social Menu', 'strt')
			)
		);

		// Add Image sizes
		add_image_size('one', 956, 9999);
		add_image_size('one_half', 556, 9999);
		add_image_size('one_half_crop', 556, 371, true);
		add_image_size('one_half_square', 556, 556, true);
		add_image_size('one_half_wide', 720, 400, true);
		add_image_size('one_third', 356, 9999);
		add_image_size('one_third_crop', 356, 237, true);
		add_image_size('one_third_square', 356, 356, true);
		add_image_size('two_third', 712, 9999);
		add_image_size('two_third_wide', 960, 480, true);
		add_image_size('one_fourth', 256, 9999);
		add_image_size('one_fourth_crop', 256, 171, true);
		add_image_size('one_fourth_square', 256, 256, true);
	}
endif;
add_action( 'after_setup_theme', 'strt_setup' );

/**
 * Make Custom Image Sizes Selectable in Admin
 */
add_filter('image_size_names_choose', function ($sizes) {
    return array_merge($sizes, array(
        'one_fourth'        => '1/4',
        'one_fourth_square' => '1/4 Square',
        'one_third'         => '1/3',
        'one_third_square'  => '1/3 Square',
        'one_half'          => '1/2',
        'one_half_square'   => '1/2 Square',
        'one'               => '1/1',
    ));
});

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
// function strt_content_width() {
// 	$GLOBALS['content_width'] = apply_filters( 'strt_content_width', 870 );
// }
// add_action( 'after_setup_theme', 'strt_content_width', 0 );

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
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'strt_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function strt_scripts() {
	// Create translatable strings for navigation
	$strt_l10n['expand']   = __('Expand submenu', 'strt');
	$strt_l10n['collapse'] = __('Collapse submenu', 'strt');

	// Load custom jQuery
	wp_deregister_script('jquery');
	wp_register_script('jquery', "https://code.jquery.com/jquery-2.2.4.min.js", array(), null);

	// Enqueue styles
	wp_enqueue_style( 'strt-stylesheet', get_stylesheet_directory_uri() . '/dist/css/styles.css', array(), STRT_VERSION );

	// Enqueue scripts
	wp_enqueue_script( 'strt-scripts', get_template_directory_uri() . '/dist/js/scripts.js', array( 'jquery' ), STRT_VERSION, true );

	// Pass translatable strings to script
	wp_localize_script('strt-scripts', 'ScreenReaderText', $strt_l10n);

	// Load comment-reply]
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
 * Snippets for this theme.
 */
require get_template_directory() . '/inc/snippets.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Load SVG Icon system.
 */
require get_template_directory() . '/inc/icons.php';

/**
 * Load custom TinyMCE setting.
 */
require get_template_directory() . '/inc/tinymce.php';

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
	require get_template_directory() . '/inc/woocommerce-cleanup.php';
}

/**
 * Load Flexbuilder file.
 */
require_once('vendor/stoutlogic/acf-builder/autoload.php');
require get_template_directory() . '/fields/flexbuilder.php';

/**
 * Load Gravityforms file.
 */
require get_template_directory() . '/inc/gravityforms/gravityforms.php';

