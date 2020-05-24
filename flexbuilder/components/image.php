<?php
$image = get_sub_field('image');
$link = get_sub_field('link');
$size = get_sub_field('size');
if ($link  && $image) :
  echo '<a href="' . wp_get_attachment_image_url($image, 'full') . '">';
endif;
if ($image) :
  echo wp_get_attachment_image($image, $size, '', array('class' => 'alignnone'));
endif;
if ($link  && $image) :
  echo '</a>';
endif;
