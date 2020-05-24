<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Starter
 * 
 * Template Name: Flexbuilder
 */

get_header();
?>
	<main class="site-main flex-content" id="content">
		<?php // get_template_part( 'flexbuilder/flexbuilder' ); ?>
		<?php include( get_template_directory() . '/flexbuilder/flexbuilder.php' ); ?>
	</main><!-- #main -->

<?php
get_footer();
