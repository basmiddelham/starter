<?php
$options = get_sub_field('options');
$alternate = (!empty($options) && in_array('alternate', $options)) ? 'alternate' : '';

if (!empty($options) && in_array('lg-img', $options)) {
    $img_column = 'col-md-5';
    $txt_column = 'col-md-7';
    $img_size = 'six' . $img_shape_str;
} else {
    $img_column = 'col-md-4';
    $txt_column = 'col-md-8';
    $img_size = 'four' . $img_shape_str;
}

echo '<div class="item_list-rows v-center ' . $alternate . '">';
foreach ($list as $list_item):
    // print_r($list_item);
    echo '<div class="row mb-4">';
    $image = ($list_item['image']) ? wp_get_attachment_image($list_item['image'], $img_size, '', array('class' => $img_shape_class . ' mx-auto')) : '';
    echo '<div class="item_list-image ' . $img_column . '">';
    if ($list_item['content']['button_link']):
        echo '<a href="' . $list_item['content']['button_link']['url'] . '" target="' . ($list_item['content']['button_link']['target'] ? $list_item['content']['button_link']['target'] : '_self') . '">';
    endif;
    echo $image;
    if ($list_item['content']['button_link']):
        echo '</a>';
    endif;
    echo '</div>';
    echo '<div class="item_list-body ' . $txt_column . '">';
    echo '<div class="inner">';
    echo $list_item['content']['editor'];
    $button_link = $list_item['content']['button_link'];
    if ($button_link):
        $button_text = $button_link['title'];
        $button_url = $button_link['url'];
        $button_target = ($button_link['target'] ? $button_link['target'] : '_self');
        echo '<a href="' . $button_url . '" target="' . $button_target . '" class="btn ' . $button_color . ' ' . $button_size . ' ' . $button_align . '" role="button">' . $button_text . '</a>';
    endif;
    echo '</div>';
    echo '</div>';
    echo '</div>';
endforeach;
echo '</div>';
