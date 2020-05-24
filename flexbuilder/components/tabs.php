<?php
$tabs = get_sub_field('tabs');
if ( is_admin() ) {
	$i1 = '1';
	$i2 = '1';
	$i3 = '1';
}
if ($tabs) :
	echo '<ul class="nav nav-tabs" role="tablist">';
	foreach ($tabs as $i4 => $tab_item) :
		$active = (($i4 == 0) ? ' active' : '');
		$selected = (($i4 == 0) ? 'true' : 'false');
		echo '<li class="nav-item">';
		echo '<a 
			class="nav-link' . $active . '" 
			id="tab_' . $i1 . $i2 . $i3 . $i4 . '" 
			data-toggle="tab" 
			href="#tabcontent_' . $i1 . $i2 . $i3 . $i4 . '" 
			role="tab" 
			aria-controls="tabcontent_' . $i1 . $i2 . $i3 . $i4 . '" 
			aria-selected="' . $selected . '">';
		echo '<h4 class="my-0">' . $tab_item['title'] . '</h4>';
		echo '</a>';
		echo '</li>';
	endforeach;
	echo '</ul>';
	echo '<div class="tab-content bg-white p-3 border-right border-bottom border-left">';
	foreach ($tabs as $i4 => $tab_item) :
		$active = (($i4 == 0) ? ' active' : ' fade');
		echo '<div 
			class="tab-pane' . $active . '" 
			id="tabcontent_' . $i1 . $i2 . $i3 . $i4 . '" 
			role="tabpanel" 
			aria-labelledby="tab_' . $i1 . $i2 . $i3 . $i4 . '">';
		echo $tab_item['content'];
		echo '</div>';
		endforeach;
	echo '</div>';
endif;
