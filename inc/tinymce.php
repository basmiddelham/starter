<?php

/**
 * TinyMCE: First line toolbar customizations
 * Defaults: 'formatselect, forecolor, bold, italic, underline, bullist, numlist, blockquote, alignleft, aligncenter, alignright, alignjustify,
 * link, unlink, wp_adv, wp_more, pastetext, pasteword, selectall, removeformat, charmap, outdent, indent, undo, redo
*/
add_filter("mce_buttons", function ($buttons) {
	return array(
		'formatselect', 'bold', 'italic', 'link', 'removeformat', 'wp_adv'
	);
});

// Second line toolbar customizations
add_filter("mce_buttons_2", function ($buttons) {
	return array(
		'styleselect', 'aligncenter', 'alignright', 'bullist', 'numlist', 'hr', 'pastetext', 'blockquote', 'charmap'
	);
});

/**
 * Add custom styles to the WordPress editor.
 */
add_filter('tiny_mce_before_init', function ($init_array) {
	$style_formats = array(
		array(
			'title' => __('Size', 'strt'),
			'items' => array(
				array(
					'title'    => __('Lead', 'strt'),
					'block' => 'p',
					'classes'  => 'lead',
				),
				array(
					'title'    => __('Small', 'strt'),
					'block' => 'p',
					'classes'  => 'small'
				),
				array(
					'title' => 'Display',
					'items' => array(
						array(
							'title'   => __('Display 1', 'strt'),
							'selector'   => 'h1, h2, h3, h4, h5, h6, p',
							'classes' => 'display-1',
						),
						array(
							'title'   => __('Display 2', 'strt'),
							'selector'   => 'h1, h2, h3, h4, h5, h6, p',
							'classes' => 'display-2',
						),
						array(
							'title'   => __('Display 3', 'strt'),
							'selector'   => 'h1, h2, h3, h4, h5, h6, p',
							'classes' => 'display-3',
						),
						array(
							'title'   => __('Display 4', 'strt'),
							'selector'   => 'h1, h2, h3, h4, h5, h6, p',
							'classes' => 'display-4',
						)
					)
				)
			)
		),
		array(
			'title' => 'Color',
			'items' => array(
				array(
					'title'   => __('Color 1', 'strt'),
					'inline'  => 'span',
					'classes' => 'text-primary',
				),
				array(
					'title'   => __('Color 2', 'strt'),
					'inline'  => 'span',
					'classes' => 'text-secondary',
				),
				array(
					'title'   => __('Muted', 'strt'),
					'inline'  => 'span',
					'classes' => 'text-muted',
				),
				array(
					'title'   => __('White', 'strt'),
					'inline'  => 'span',
					'classes' => 'text-white',
				),
				array(
					'title'   => __('Light', 'strt'),
					'inline'  => 'span',
					'classes' => 'text-light',
				),
				array(
					'title'   => __('Dark', 'strt'),
					'inline'  => 'span',
					'classes' => 'text-dark',
				)
			)
		)
	);
	$init_array['style_formats'] = json_encode($style_formats);
	return $init_array;
});
