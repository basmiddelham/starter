<?php
$button_group       = get_sub_field('button_group');
$button_group_align = get_sub_field('button_group_align');
$button_group_size  = get_sub_field('button_group_size');
if ( have_rows('button_group' ) ):
	echo '<div class="btn-group ' . $button_group_align . '">';
	while ( have_rows( 'button_group' ) ): the_row();
		include(get_template_directory() . '/flexbuilder/components/button.php');
	endwhile;
	echo '</div>';
endif;
