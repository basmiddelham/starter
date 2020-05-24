<?php
$column_amount = get_sub_field('column_amount');
// $list = get_sub_field('list');
// var_dump($list);
switch($column_amount) :
case '2':
	$column_classes = 'col-sm-6';
	$img_size       = 'one_half' . $img_shape_str;
	break;
case '3':
	$column_classes = 'col-sm-6 col-lg-4';
	$img_size       = 'one_third' . $img_shape_str;
	break;
case '4':
	$column_classes = 'col-sm-6 col-lg-3';
	$img_size       = 'one_fourth' . $img_shape_str;
	break;
endswitch;
echo '<div class="row item_list-columns justify-content-center">';
foreach ($list as $list_item) :
	$image = ($list_item['image']) ? wp_get_attachment_image($list_item['image'], $img_size, '', array('class' => $img_shape_class . ' mx-auto d-table mb-3')) : '';
	echo '<div class="' . $column_classes . ' mb">';
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
	if ($list_item['content']['button_link']) :
		echo '<div class="item_list-footer">';
		include(get_template_directory() . '/flexbuilder/components/button.php');

			//   $data = $list_item['content'],
			//   $data['button_color'] = $row['buttons']['button_color'],
			//   $data['button_size'] = $row['buttons']['button_size'],
			//   $data['button_align'] = $row['buttons']['button_align']
			// ]);
		echo '</div>';
	endif;
	echo '</div>';
	echo '</div>';
endforeach;
echo '</div>';