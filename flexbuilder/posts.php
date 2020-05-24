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
	$thumbsize = 'half';
} elseif ($post_columns === 'col-md-4') {
	$thumbsize = 'third';
} else {
	$thumbsize = 'fourth';
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
	echo '<div class="row"><div class="col-9 mx-auto">' . $intro . '</div></div>';
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
	if (get_the_post_thumbnail()) :
		echo '<header>';
		echo '<a href="' . $permalink . '">' . get_the_post_thumbnail($post->ID, 'one_' . $thumbsize . '_crop') . '</a>';
		echo '<h3><a href="' . $permalink . '">' . get_the_title() . '</a></h3>';
		if (in_array('show_date', $post_options) || in_array('show_author', $post_options)) :
			echo '<div class="post-meta">';
			if (in_array('show_date', $post_options)) :
				echo '<time class="updated" datetime="' . get_post_time('c', true) . '">' . get_the_date() . '</time>';
			endif;
			if (in_array('show_author', $post_options)) :
				echo '<span class="byline author vcard">' . __('By', 'strt') . ' <a href="' . get_author_posts_url(get_the_author_meta('ID')) . '" rel="author" class="fn">' . get_the_author() . '</a></span>';
			endif;
			echo '</div>';
		endif;
		echo '</header>';
	endif;
	echo '<p>' . $excerpt_crop . '</p>';
	if (in_array('show_cats', $post_options) && $post_type === 'post') :
		echo '<div class="categories">' . __('Posted in: ', 'strt') . get_the_category_list(', ') . '.</div>';
	endif;
	echo '</article>';
endwhile;
wp_reset_postdata();

if (in_array('show_more', $post_options)) :
	$button = get_sub_field('button');
	echo '<div class="col-12">';
	if ( have_rows('button' ) ):
		while ( have_rows( 'button' ) ): the_row();
			include(get_template_directory() . '/flexbuilder/components/button.php');
		endwhile;
	endif;
	echo '</div>';
endif;

echo '</div>';