<?php
$gallery         = get_sub_field('gallery');
$gallery_columns = get_sub_field('gallery_columns');
$gallery_size    = get_sub_field('gallery_size');
$gallery_link    = get_sub_field('gallery_link');

if ($gallery) :
	$shortcode = '[gallery columns="' . $gallery_columns . '" size="' . $gallery_size . '" link="' . $gallery_link . '" ids="' . implode(',', $gallery) . '"]';
	echo do_shortcode($shortcode);
endif;
