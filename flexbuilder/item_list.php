<?php
$list = get_sub_field('list');
$image_shape = get_sub_field('image_shape');
$layout = get_sub_field('layout');

if ($list) :
	$img_shape_str   = ('round' === $image_shape) ? '_square' : '_' . $image_shape;
	$img_shape_class = ('round' === $image_shape || 'square' === $image_shape) ? $image_shape : '';
	if ($layout === 'columns') :
		include(get_template_directory() . '/flexbuilder/partials/item_list_columns.php');
	elseif (($layout === 'rows')) :
		include(get_template_directory() . '/flexbuilder/partials/item_list_rows.php');
	elseif (($layout === 'wide_rows')) :
		include(get_template_directory() . '/flexbuilder/partials/item_list_wide_rows.php');
	endif;
endif;
