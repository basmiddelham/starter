<?php
echo' <div class="item_list-wide_rows alternate">';
foreach ($row['field_flexbuilder_flexbuilder_item_list_list'] as $list_item) :
	$image = ($list_item['field_flexbuilder_flexbuilder_item_list_list_image']) ? wp_get_attachment_image_url($list_item['field_flexbuilder_flexbuilder_item_list_list_image'], 'one_half') : '';
	echo '<div class="row">';
	echo '<div class="item_list-image col-md-6" style="background-image:url(' . $image .'"></div>';
	echo '<div class="item_list-body col-md-6">';
	echo '<div class="inner cp-lg">';
	echo $list_item['field_flexbuilder_flexbuilder_item_list_list_content']['field_flexbuilder_flexbuilder_item_list_list_content_editor'];
	include(get_template_directory() . '/flexbuilder/components/button.php');
	// include('flexbuilder.components.button', [$data = $list_item['content'],$data['button_color'] = $row['buttons']['button_color'],$data['button_size'] = $row['buttons']['button_size'],$data['button_align'] = $row['buttons']['button_align']]);
	echo '</div>';
	echo '</div>';
	echo '</div>';
endforeach;
echo '</div>';
