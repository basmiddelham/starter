<?php
$alternate = (!empty($row['field_flexbuilder_flexbuilder_item_list_options']) && in_array('alternate', $row['field_flexbuilder_flexbuilder_item_list_options'])) ? 'alternate' : '';
if (!empty($row['options']) && in_array('bg-img', $row['field_flexbuilder_flexbuilder_item_list_options'])) {
	$img_column     = 'col-md-5';
	$txt_column     = 'col-md-7';
	$img_size       = 'one_half' . $img_shape_str;
} else {
	$img_column     = 'col-md-4';
	$txt_column     = 'col-md-8';
	$img_size       = 'one_third' . $img_shape_str;
}

echo '<div class="item_list-rows v-center ' . $alternate . '">';
foreach ($row['field_flexbuilder_flexbuilder_item_list_list'] as $list_item) :
	echo '<div class="row mb">';
	$image = ($list_item['field_flexbuilder_flexbuilder_item_list_list_image']) ? wp_get_attachment_image($list_item['field_flexbuilder_flexbuilder_item_list_list_image'], $img_size, '', array('class' => $row['field_flexbuilder_flexbuilder_item_list_image_shape'] . ' mx-auto')) : '';
	echo '<div class="item_list-image ' . $img_column . '">';
	if ($list_item['field_flexbuilder_flexbuilder_item_list_list_content']['button_link']) :
		echo '<a href="' . $list_item['field_flexbuilder_flexbuilder_item_list_list_content']['button_link']['url'] . '" target="' . ($list_item['content']['button_link']['target'] ? $list_item['field_flexbuilder_flexbuilder_item_list_list_content']['button_link']['target'] : '_self') . '">';
	endif;
	echo $image;
	if ($list_item['field_flexbuilder_flexbuilder_item_list_list_content']['button_link']) : 
		echo '</a>';
	endif;
	echo '</div>';
	echo '<div class="item_list-body ' . $txt_column . '">';
	echo '<div class="inner">';
	echo $list_item['field_flexbuilder_flexbuilder_item_list_list_content']['field_flexbuilder_flexbuilder_item_list_list_content_editor'];
	include(get_template_directory() . '/flexbuilder/components/button.php');

	// include('flexbuilder.components.button';
			// $data = $list_item['content'],
			// $data['button_color'] = $row['buttons']['button_color'],
			// $data['button_size'] = $row['buttons']['button_size'],
			// $data['button_align'] = $row['buttons']['button_align']
	echo '</div>';
	echo '</div>';
	echo '</div>';
endforeach;
echo '</div>';
