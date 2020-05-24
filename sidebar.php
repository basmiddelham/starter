<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package strt
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside class="widget-area">
	<?php
	if (is_woocommerce() || is_cart()) {
		dynamic_sidebar( 'sidebar-woocommerce' );
	} else {
		dynamic_sidebar( 'sidebar-1' );
	}
	?>
</aside><!-- .widget-area -->
