<?php
$heading_text  = get_sub_field('heading_text');
$heading_size  = get_sub_field('heading_size');
$display_size  = get_sub_field('display_size');
$display_class = ($display_size) ? ' class="display-' . $display_size . '"' : '';
if ($heading_text) :
  echo '<h' . $heading_size . $display_class . ' class="heading">';
  echo $heading_text;
  echo '</h' . $heading_size . '>';
endif;
