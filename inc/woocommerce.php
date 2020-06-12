<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package strt
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */

// define the get_product_search_form callback 
// function filter_get_product_search_form( $form ) { 
// 	$form ='<form role="search" method="get" class="woocommerce-product-search" action="' . esc_url( home_url( '/' ) ) . '">
// 	<label class="screen-reader-text" for="woocommerce-product-search-field">' . esc_html_e( 'Search for:', 'woocommerce' ) . '</label>
// 	<input type="search" id="woocommerce-product-search-field" class="search-field" placeholder="' . esc_attr__( 'Search products&hellip;', 'woocommerce' ) . '" value="' . get_search_query() . '" name="s" />
// 	<button type="submit" value="' . esc_attr_x( 'Search', 'submit button', 'woocommerce' ) . '">' . esc_html_x( 'Search', 'submit button', 'woocommerce' ) . '</button>
// 	<input type="hidden" name="post_type" value="product" />
// 	</form>';
//     return $form; 
// };
// // add the filter
// add_filter( 'get_product_search_form', 'filter_get_product_search_form', 10, 1 );


function strt_woocommerce_setup() {
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 250,
			'single_image_width'    => 396,
			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'default_columns' => 4,
				'min_columns'     => 1,
				'max_columns'     => 6,
			),
		)
	);
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'strt_woocommerce_setup' );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function strt_woocommerce_scripts() {
	// wp_enqueue_style( 'strt-woocommerce-style', get_template_directory_uri() . '/woocommerce.css', array(), STRT_VERSION );

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style( 'strt-woocommerce-style', $inline_font );
}
add_action( 'wp_enqueue_scripts', 'strt_woocommerce_scripts' );

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function strt_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'strt_woocommerce_active_body_class' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function strt_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'strt_woocommerce_related_products_args' );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'strt_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function strt_woocommerce_wrapper_before() {
		echo '<div class="container sb">';
		echo '<main class="site-main" id="content">';
	}
}
add_action( 'woocommerce_before_main_content', 'strt_woocommerce_wrapper_before' );

if ( ! function_exists( 'strt_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function strt_woocommerce_wrapper_after() {
		echo '</main><!-- #content -->';
		do_action( 'woocommerce_sidebar' );
		echo '</div><!-- #container sb -->';
	}
}
add_action( 'woocommerce_after_main_content', 'strt_woocommerce_wrapper_after' );

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
	<?php
		if ( function_exists( 'strt_woocommerce_header_cart' ) ) {
			strt_woocommerce_header_cart();
		}
	?>
 */

if ( ! function_exists( 'strt_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function strt_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		strt_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'strt_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'strt_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function strt_woocommerce_cart_link() {
		?>
		<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'strt' ); ?>">
			<?php
			$count = WC()->cart->get_cart_contents_count();
			if ($count != 0) {
				$item_count_text = sprintf(
					/* translators: number of items in the mini cart. */
					_n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'strt' ),
					WC()->cart->get_cart_contents_count()
				);
			?>
			<span class="amount"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span> <span class="count"><?php echo esc_html( $item_count_text ); ?></span>
			<?php } ?>
			<?php the_theme_svg('cart'); ?>
		</a>
		<?php
	}
}

if ( ! function_exists( 'strt_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function strt_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
		<ul id="site-header-cart" class="site-header-cart navbar-nav">
			<li class="menu-item <?php echo esc_attr( $class ); ?>">
				<?php strt_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
				$instance = array(
					'title' => '',
				);

				the_widget( 'WC_Widget_Cart', $instance );
				?>
			</li>
		</ul>
		<?php
	}
}


/**
 * Register Woocommerce sidebar
 */
add_action('widgets_init', function () {
	register_sidebar([
		'name'          => __('Woocommerce', 'strt'),
		'id'            => 'sidebar-woocommerce',
		'before_widget' => '<section class="widget %1$s %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	]);
});

/**
 * Hide shipping rates when free shipping is available.
 */
add_filter('woocommerce_package_rates', function ($rates) {
	$free = array();
	foreach ($rates as $rate_id => $rate) {
		if ('free_shipping' === $rate->method_id) {
			$free[ $rate_id ] = $rate;
			break;
		}
	}
	return ! empty($free) ? $free : $rates;
}, 100);

/**
 * Change breadcrumb to Bootstrap defaults
 */
add_filter('woocommerce_breadcrumb_defaults', function () {
	return array(
		'delimiter'   => '',
		'wrap_before' => '<nav class="woocommerce-breadcrumb" aria-label="breadcrumb"><ol class="breadcrumb">',
		'wrap_after'  => '</ol></nav>',
		'before'      => '<li class="breadcrumb-item">',
		'after'       => '</li>',
		'home'        => __('Home', 'breadcrumb', 'strt'),
	);
});
