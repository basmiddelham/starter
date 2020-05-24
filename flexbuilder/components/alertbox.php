<?php
$alertbox_editor = get_sub_field('alertbox_editor');
$alertbox_color  = get_sub_field('alertbox_color');
if ($alertbox_editor) :
	echo '<div class="alert ' . $alertbox_color . '" role="alert">';
	echo $alertbox_editor;
	echo '</div>';
endif;
