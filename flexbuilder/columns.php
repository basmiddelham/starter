<?php
// If there are layout options add them to $column_classes
if (isset($section['field_fb_section_cols_column_options'])) {
    $column_options = implode(' ', (array) $section['field_fb_section_cols_column_options']);
} else {
    $column_options = '';
}

// Include a space or leave empty
$column_classes = ($column_options) ? ' ' . $column_options : '';

if (have_rows('columns')):
    while (have_rows('columns')): $column = the_row();
        $columns_layout = $column["acf_fc_layout"];
        switch ($columns_layout):

        // Heading
        case ('heading'):
            echo ($column_classes) ? '<div class="' . $column_options . '">' : '';
            include get_template_directory() . '/flexbuilder/components/heading.php';
            echo ($column_classes) ? '</div>' : '';
            break;

        // Divider
        case ('divider'):
            $divider = ($column['field_fb_section_cols_columns_divider_display_line']) ? '<hr>' : '<div class="w-100 py-4"></div>';
            echo $divider;
            break;

        // 1 Column small
        case ('1_column_sm'):
            echo '<div class="row' . $column_classes . '">';
            if (have_rows('col_1')):
                while (have_rows('col_1')): the_row();
                    echo '<div class="col-lg-9 mx-auto"><div class="inner">';
                    include get_template_directory() . '/flexbuilder/partials/column_content.php';
                    echo '</div></div>';
                endwhile;
            endif;
            echo '</div>';
            break;

        // 1 Column
        case ('1_column'):
            echo '<div class="row' . $column_classes . '">';
            if (have_rows('col_1')):
                while (have_rows('col_1')): the_row();
                    echo '<div class="col-md-12"><div class="inner">';
                    include get_template_directory() . '/flexbuilder/partials/column_content.php';
                    echo '</div></div>';
                endwhile;
            endif;
            echo '</div>';
            break;

        // 2 Columns
        case ('2_columns'):
            echo '<div class="row' . $column_classes . '">';
            if (have_rows('col_1')):
                while (have_rows('col_1')): the_row();
                    echo '<div class="col-md-6"><div class="inner">';
                    include get_template_directory() . '/flexbuilder/partials/column_content.php';
                    echo '</div></div>';
                endwhile;
            endif;
            if (have_rows('col_2')):
                while (have_rows('col_2')): the_row();
                    echo '<div class="col-md-6"><div class="inner">';
                    include get_template_directory() . '/flexbuilder/partials/column_content.php';
                    echo '</div></div>';
                endwhile;
            endif;
            echo '</div>';
            break;

        // 3 Columns
        case ('3_columns'):
            echo '<div class="row' . $column_classes . '">';
            if (have_rows('col_1')):
                while (have_rows('col_1')): the_row();
                    echo '<div class="col-lg-4"><div class="inner">';
                    include get_template_directory() . '/flexbuilder/partials/column_content.php';
                    echo '</div></div>';
                endwhile;
            endif;
            if (have_rows('col_2')):
                while (have_rows('col_2')): the_row();
                    echo '<div class="col-lg-4"><div class="inner">';
                    include get_template_directory() . '/flexbuilder/partials/column_content.php';
                    echo '</div></div>';
                endwhile;
            endif;
            if (have_rows('col_3')):
                while (have_rows('col_3')): the_row();
                    echo '<div class="col-lg-4"><div class="inner">';
                    include get_template_directory() . '/flexbuilder/partials/column_content.php';
                    echo '</div></div>';
                endwhile;
            endif;
            echo '</div>';
            break;


        // 4 Columns
        case ('4_columns'):
            echo '<div class="row' . $column_classes . '">';
            if (have_rows('col_1')):
                while (have_rows('col_1')): the_row();
                    echo '<div class="col-md-6 col-xl-3"><div class="inner">';
                    include get_template_directory() . '/flexbuilder/partials/column_content.php';
                    echo '</div></div>';
                endwhile;
            endif;
            if (have_rows('col_2')):
                while (have_rows('col_2')): the_row();
                    echo '<div class="col-md-6 col-xl-3"><div class="inner">';
                    include get_template_directory() . '/flexbuilder/partials/column_content.php';
                    echo '</div></div>';
                endwhile;
            endif;
            if (have_rows('col_3')):
                while (have_rows('col_3')): the_row();
                    echo '<div class="col-md-6 col-xl-3"><div class="inner">';
                    include get_template_directory() . '/flexbuilder/partials/column_content.php';
                    echo '</div></div>';
                endwhile;
            endif;
            if (have_rows('col_4')):
                while (have_rows('col_4')): the_row();
                    echo '<div class="col-md-6 col-xl-3"><div class="inner">';
                    include get_template_directory() . '/flexbuilder/partials/column_content.php';
                    echo '</div></div>';
                endwhile;
            endif;
            echo '</div>';
            break;

        // Left wide
        case ('left_wide'):
            echo '<div class="row' . $column_classes . '">';
            if (have_rows('col_1')):
                while (have_rows('col_1')): the_row();
                    echo '<div class="col-md-8"><div class="inner">';
                    include get_template_directory() . '/flexbuilder/partials/column_content.php';
                    echo '</div></div>';
                endwhile;
            endif;
            if (have_rows('col_2')):
                while (have_rows('col_2')): the_row();
                    echo '<div class="col-md-4"><div class="inner">';
                    include get_template_directory() . '/flexbuilder/partials/column_content.php';
                    echo '</div></div>';
                endwhile;
            endif;
            echo '</div>';
            break;

        // Right wide
        case ('right_wide'):
            echo '<div class="row' . $column_classes . '">';
            if (have_rows('col_1')):
                while (have_rows('col_1')): the_row();
                    echo '<div class="col-md-4"><div class="inner">';
                    include get_template_directory() . '/flexbuilder/partials/column_content.php';
                    echo '</div></div>';
                endwhile;
            endif;
            if (have_rows('col_2')):
                while (have_rows('col_2')): the_row();
                    echo '<div class="col-md-8"><div class="inner">';
                    include get_template_directory() . '/flexbuilder/partials/column_content.php';
                    echo '</div></div>';
                endwhile;
            endif;
            echo '</div>';
            break;

        endswitch;
        $i2++;
    endwhile;
endif;
