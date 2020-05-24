<?php
$button_link = get_sub_field( 'button_link' );
$button_size = get_sub_field( 'button_size' );
// var_dump($button_link);
if ( false === get_sub_field( 'button_size' ) ) {
  // echo 'yo';
  $button_size = $button_group_size;
};

if ($button_link) :
  $button_text   = $button_link['title'];
  $button_url    = $button_link['url'];
  $button_color  = get_sub_field('button_color');
  $button_align  = get_sub_field('button_align');
  $button_target = ($button_link['target'] ? $button_link['target'] : '_self');

  echo '<a href="' . $button_url . '" target="' . $button_target . '" class="btn ' . $button_color . ' ' . $button_size . ' ' . $button_align . '" role="button">' . $button_text . '</a>';
endif;
