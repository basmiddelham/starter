<?php
/**
 * Template Name: Flexbuilder
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package strt
 */

get_header();
?>
	<main class="site-main flex-content" id="content">
		<?php // get_template_part( 'flexbuilder/flexbuilder' ); ?>
		<?php include( get_template_directory() . '/flexbuilder/flexbuilder.php' ); ?>
	</main><!-- #content -->

<?php
get_footer();
