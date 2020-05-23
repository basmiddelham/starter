<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package strt
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'strt' ); ?></a>

<header class="navbar navbar-expand-lg navbar-light bg-light" id="masthead">
	<div class="container">
		<a class="navbar-brand" href="<?php echo home_url('/') ?>" rel="home"><?php echo get_bloginfo('name', 'display') ?></a>
		<button class="hamburger hamburger--collapse" type="button" data-toggle="collapse" data-target="#primary_navigation" aria-controls="primary_navigation" aria-expanded="false" aria-label="Toggle navigation">
			<span class="hamburger-box"><span class="hamburger-inner"></span></span>
		</button>
		<nav class="collapse navbar-collapse" id="primary_navigation">
		<?php 
		if (has_nav_menu('primary_navigation')) :
			wp_nav_menu(['theme_location' => 'primary_navigation', 'container' => '', 'menu_class' => 'navbar-nav ml-auto']);
		endif;
		?>
		</nav>
	</div>
</header>

<div class="site">
