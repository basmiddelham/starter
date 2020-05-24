<?php
$accordion = get_sub_field('accordion');
if ( is_admin() ) {
	$i1 = 0;
	$i2 = 0;
	$i3 = 0;
}
if ($accordion) :
	echo '<div id="accordion_' . $i1 . $i2 . $i3 . '" class="accordion">';
		foreach ($accordion as $i4 => $accordion_item) :
			$expanded = ($i4 == 0) ? 'true' : 'false';
			$collapse = ($i4 == 0) ? ' show' : '';
			echo '<div class="accordion_item card">
					<a href="javascript:void(0)" 
						class="card-header" 
						data-toggle="collapse" 
						data-target="#collapse_' . $i1 . $i2 . $i3 . $i4 . '" 
						aria-expanded="' . $expanded . '" 
						aria-controls="collapse_' . $i1 . $i2 . $i3 . $i4 . '">
						<h4 id="heading_' . $i1 . $i2 . $i3 . $i4 . '" class="my-0">' . $accordion_item['title'] . '</h4>
					</a>
					<div id="collapse_' . $i1 . $i2 . $i3 . $i4 . '" 
						class="collapse' . $collapse . '" 
						aria-labelledby="heading_' . $i1 . $i2 . $i3 . $i4 . '" 
						data-parent="#accordion_' . $i1 . $i2 . $i3 . '">
						<div class="card-body">' . $accordion_item['content'] . '</div>
					</div>
				</div>';
		endforeach;
		echo '</div>';
endif;
