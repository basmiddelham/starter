<?php
$video_type   = get_sub_field('video_type');
$video_aspect = get_sub_field('video_aspect');
$embed_link   = get_sub_field('embed_link');
$mp4_file     = get_sub_field('mp4_file');

if ('embed' === $video_type && $embed_link) :
  echo '<div class="embed-responsive embed-responsive-' . $video_aspect . '">';
  echo $embed_link;
  echo '</div>';

elseif ('mp4' === $video_type && $mp4_file) :
  $mp4_options   = get_sub_field('mp4_options');
  echo '<video ' . implode(' ', $mp4_options) . '>';
  echo '<source src="' . $mp4_file . '" type="video/mp4">
    Your browser does not support the video tag. </video>';
endif;
