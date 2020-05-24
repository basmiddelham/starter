<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package strt
 */

?>
</div><!-- #content -->
<footer class="footer">
	<div class="container">
		<?php if (has_nav_menu('social')) : ?>
			<nav aria-label="<?php esc_attr_e( 'Social links', 'strt' ); ?>" class="social-menu-wrapper">
				<ul class="social-menu">
					<?php 
					wp_nav_menu(
						array(
							'theme_location'  => 'social',
							'container'       => '',
							'container_class' => '',
							'items_wrap'      => '%3$s',
							'depth'           => 1,
							'link_before'     => '<span class="screen-reader-text">',
							'link_after'      => '</span>',
							'fallback_cb'     => '',
						)
					);
					?>
				</ul><!-- .footer-social -->
			</nav><!-- .footer-social-wrapper -->
		<?php endif; ?>
		<?php echo date("Y") ?> &copy; <a href="<?php echo home_url('/'); ?>" rel="home"><?php echo get_bloginfo('name'); ?></a><span class="sep"> | </span><?php echo get_bloginfo( 'description' ) ?>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
