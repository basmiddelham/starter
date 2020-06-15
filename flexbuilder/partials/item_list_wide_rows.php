<?php
echo' <div class="item_list-wide_rows alternate">';
foreach ($list as $list_item) :
	$image = ($list_item['image']) ? wp_get_attachment_image_url($list_item['image'], 'six_natural') : '';
	echo '<div class="row">';
	echo '<div class="item_list-image col-md-6" style="background-image:url(' . $image .'"></div>';
	echo '<div class="item_list-body col-md-6">';
	echo '<div class="inner p-5">';
	echo $list_item['content']['editor'];
	$button_link = $list_item['content']['button_link'];
	if ($button_link) :
	  $button_text   = $button_link['title'];
	  $button_url    = $button_link['url'];
	  $button_target = ($button_link['target'] ? $button_link['target'] : '_self');
	  echo '<a href="' . $button_url . '" target="' . $button_target . '" class="btn ' . $button_color . ' ' . $button_size . ' ' . $button_align . '" role="button">' . $button_text . '</a>';
	endif;
	echo '</div>';
	echo '</div>';
	echo '</div>';
endforeach;
echo '</div>';
