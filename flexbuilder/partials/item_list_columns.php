<?php
$column_amount = get_sub_field('column_amount');

switch($column_amount) :
case '2':
	$column_classes = 'col-sm-6';
	$img_size       = 'six' . $img_shape_str;
	break;
case '3':
	$column_classes = 'col-sm-6 col-lg-4';
	$img_size       = 'four' . $img_shape_str;
	break;
case '4':
	$column_classes = 'col-sm-6 col-lg-3';
	$img_size       = 'three' . $img_shape_str;
	break;
endswitch;
echo '<div class="row item_list-columns justify-content-center">';
foreach ($list as $list_item) :
	$image = ($list_item['image']) ? wp_get_attachment_image($list_item['image'], $img_size, '', array('class' => $img_shape_class . ' mx-auto d-table mb-3')) : '';
	echo '<div class="' . $column_classes . ' mb-4">';
	echo '<div class="item_list-item">';
	if ($image) :
		echo '<div class="item_list-image">';
		if ($list_item['content']['button_link']) :
			echo '<a href="' . $list_item['content']['button_link']['url'] . '" target="' . ($list_item['content']['button_link']['target'] ? $list_item['content']['button_link']['target'] : '_self') . '">';
		endif;
		echo $image;
		if ($list_item['content']['button_link']) :
			echo '</a>';
		endif;
		echo '</div>';
	endif;
	if ($list_item) :
		echo '<div class="item_list-body">' . $list_item['content']['editor'] . '</div>';
	endif;

	$button_link = $list_item['content']['button_link'];
	if ($button_link) :
	  $button_text   = $button_link['title'];
	  $button_url    = $button_link['url'];
	  $button_target = ($button_link['target'] ? $button_link['target'] : '_self');
	
	  echo '<a href="' . $button_url . '" target="' . $button_target . '" class="btn ' . $button_color . ' ' . $button_size . ' ' . $button_align . '" role="button">' . $button_text . '</a>';
	endif;

	echo '</div>';
	echo '</div>';
endforeach;
echo '</div>';
