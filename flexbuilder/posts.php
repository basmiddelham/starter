<?php
global $post;

$intro = get_sub_field('intro');
$post_columns = get_sub_field('post_columns');
$post_amount = get_sub_field('post_amount');
$post_excerpt_length = get_sub_field('excerpt_length');
$post_type = get_sub_field('post_type');
$post_options = get_sub_field('post_options');
$post_tax = get_sub_field('post_tax');

// Columns size
if ($post_columns === 'col-md-6') {
	$thumbsize = 'six';
} elseif ($post_columns === 'col-md-4') {
	$thumbsize = 'four';
} else {
	$thumbsize = 'three';
}

// Category
$tax_query = array('relation' => 'AND');
if ($post_type === 'post' && $post_tax) {
	$tax_query[] =  array(
		'taxonomy' => 'category',
		'field' => 'id',
		'terms' => $post_tax
	);
}

// Post type (ACF Extended required)
$args = array(
	'post_type'           => $post_type,
	'posts_per_page'      => $post_amount,
	'ignore_sticky_posts' => true,
	'post_status'         => 'publish',
	'tax_query'           => $tax_query
);

// WP Query
$query = new WP_Query( $args );

if ($intro) :
	echo '<div class="row"><div class="col-9 mx-auto mb-2">' . $intro . '</div></div>';
endif;

echo '<div class="row">';
while ($query->have_posts()) :
	$query->the_post();
	$permalink      = get_the_permalink();
	$excerpt        = get_the_excerpt();
	$excerpt_length = ($post_excerpt_length) ? (int) $post_excerpt_length : 280;
	$excerpt        = substr($excerpt, 0, $excerpt_length);
	$excerpt_crop   = substr($excerpt, 0, strrpos($excerpt, ' ')) . '... <a href="' . $permalink . '">' . __('Read More', 'strt') . '</a>';
	echo '<article '; post_class('post-item ' . $post_columns . ' mb-4'); echo '>';
	echo '<header>';
		if (get_the_post_thumbnail()) :
			echo '<a href="' . $permalink . '">' . get_the_post_thumbnail($post->ID, $thumbsize . '_wide') . '</a>';
		endif;
		echo '<h3><a href="' . $permalink . '">' . get_the_title() . '</a></h3>';
		if (in_array('show_date', $post_options) || in_array('show_author', $post_options)) :
			echo '<div class="post-meta small">';
			if (in_array('show_date', $post_options)) :
				strt_posted_on();
			endif;
			if (in_array('show_author', $post_options)) :
				strt_posted_by();
			endif;
			echo '</div>';
		endif;
	echo '</header>';
	echo '<p>' . $excerpt_crop . '</p>';
	if (in_array('show_cats', $post_options) && $post_type === 'post') :
		echo '<div class="categories small">' . __('Posted in: ', 'strt') . get_the_category_list(', ') . '.</div>';
	endif;
	echo '</article>';
endwhile;
wp_reset_postdata();

if (in_array('show_more', $post_options)) :
	$button = get_sub_field('button');
	echo '<div class="col-12 mb-2">';
	if ( have_rows('button' ) ):
		while ( have_rows( 'button' ) ): the_row();
			include(get_template_directory() . '/flexbuilder/components/button.php');
		endwhile;
	endif;
	echo '</div>';
endif;

echo '</div>';
