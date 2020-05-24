<?php
if (is_admin()) {
	$i3 = 0;
}

if ( have_rows('content') ):
	while ( have_rows('content') ) : $content = the_row();
		$content_layout = $content["acf_fc_layout"];
		switch ($content_layout) :
			case ('googlemap') :
				include(get_template_directory() . '/flexbuilder/components/googlemap.php');
				break;
			case ('editor') :
				include(get_template_directory() . '/flexbuilder/components/editor.php');
				break;
			case ('heading') :
				include(get_template_directory() . '/flexbuilder/components/heading.php');
				break;
			case ('button') :
				include(get_template_directory() . '/flexbuilder/components/button.php');
				break;
			case ('button_group') :
				include(get_template_directory() . '/flexbuilder/components/button_group.php');
				break;
			case ('gallery') :
				include(get_template_directory() . '/flexbuilder/components/gallery.php');
				break;
			case ('alertbox') :
				include(get_template_directory() . '/flexbuilder/components/alertbox.php');
				break;
			case ('table') :
				include(get_template_directory() . '/flexbuilder/components/table.php');
				break;
			case ('accordion') :
				include(get_template_directory() . '/flexbuilder/components/accordion.php');
				break;
			case ('video') :
				include(get_template_directory() . '/flexbuilder/components/video.php');
				break;
			case ('tabs') :
				include(get_template_directory() . '/flexbuilder/components/tabs.php');
				break;
			case ('image') :
				include(get_template_directory() . '/flexbuilder/components/image.php');
				break;
		endswitch;
		$i3++;
	endwhile;
	// endforeach;
endif;