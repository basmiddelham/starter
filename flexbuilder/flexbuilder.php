<?php
// Set counterd for multiple Tabs and Accordions per page
$i1 = 0;
$i2 = 0;
$i3 = 0;

if (have_rows('section')):
    while (have_rows('section')): $section = the_row();
        $section_layout    = $section['acf_fc_layout'];
        $section_width     = $section['field_field_fb_section_' . $section_layout . '_settings']['field_section_options_section_width'];
        $section_bg        = $section['field_field_fb_section_' . $section_layout . '_settings']['field_section_options_section_bg'];
        $section_bg_image  = $section['field_field_fb_section_' . $section_layout . '_settings']['field_section_options_section_bg_image'];
        $section_bg_repeat = $section['field_field_fb_section_' . $section_layout . '_settings']['field_section_options_section_bg_repeat'];
        $section_color     = $section['field_field_fb_section_' . $section_layout . '_settings']['field_section_options_section_color'];
        $section_bg_style  = '';
        $section_classes   = [$section_layout];

        // Check for background color or image.
        if ($section_bg):
            array_push($section_classes, $section_color);

            // If there is a background image.
            if ('bg-img' === $section_bg && $section_bg_image):
                array_push($section_classes, 'bg-img');

                // Update $section_bg_style.
                $section_bg_style = ' style="background-image: url(' . wp_get_attachment_image_url($section_bg_image, 'large_letterbox') . ')"';

                // If option 'Background repeat' is enabled add class to $section_classes.
                ($section_bg_repeat) ? array_push($section_classes, 'bg-repeat') : '';

            // If no background image (only color), add standard padding.
            else:
                array_push($section_classes, $section_bg);
            endif;

        endif;

        // Add container and a wrapper if necessary.
        if (!empty($section_bg) && 'container-fluid' !== $section_width):
            echo '<section class="' . implode(' ', $section_classes) . '"' . $section_bg_style . '>';
            echo '<div class="' . $section_width . '">';
        else:
            echo '<section class="' . implode(' ', $section_classes) . ' ' . $section_width . '" ' . $section_bg_style . '>';
        endif;

        // Load the layouts
        if ('pageheader' === $section_layout):
            include get_template_directory() . '/flexbuilder/pageheader.php';
        elseif ('cols' === $section_layout):
            include get_template_directory() . '/flexbuilder/columns.php';
        elseif ('posts' === $section_layout):
            include get_template_directory() . '/flexbuilder/posts.php';
        elseif ('item_list' === $section_layout):
            include get_template_directory() . '/flexbuilder/item_list.php';
        endif;

        // Close container and wrapper
        if (!empty($section_bg) && 'container-fluid' !== $section_width):
            echo '</div>';
            echo '</section>';
        else:
            echo '</section>';
        endif;
        $i1++;
    endwhile;
endif;
