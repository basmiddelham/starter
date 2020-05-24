<?php
$table = get_sub_field('table');
if ($table) :
	$table_options = get_sub_field('table_options');
	echo '<div class="table-responsive">';
	echo '<table class="table ' . implode(' ', $table_options) . ' ">';
	if ( $table['header'] ) :
		echo '<thead class="thead-light">';
		echo '<tr>';
		foreach ( $table['header'] as $th ) :
			echo '<th scope="col">' . $th['c'] . ' </th>';
		endforeach;
		echo '</tr>';
		echo '</thead>';
	endif;
	echo '<tbody>';
	foreach ( $table['body'] as $tr ) :
		echo '<tr>';
		foreach ( $tr as $td ) :
			echo '<td>' . $td['c'] . ' </td>';
		endforeach;
		echo '</tr>';
	endforeach;
	echo '</tbody>';
	echo '</table>';
	echo '</div>';
endif;
