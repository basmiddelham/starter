<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$columns = new FieldsBuilder('cols');
$columns

    // Column options
    ->addTab('columns', ['placement' => 'left'])

        // Column layouts
        ->addFlexibleContent('columns', [
            'button_label' => __('Add row', 'sage'),
            'acfe_flexible_advanced' => 1,
            'acfe_flexible_title_edition' => 1,
            'acfe_flexible_clone' => 1,
            'acfe_flexible_copy_paste' => 1,
            // 'acfe_flexible_close_button' => 1,
            // 'acfe_flexible_layouts_templates' => 1,
            // 'acfe_flexible_layouts_previews' => 1,
            // 'acfe_flexible_layouts_settings' => 1,
            // 'acfe_flexible_layouts_ajax' => 1,
        ])
            // Heading
            ->addLayout('heading', ['label' => __('Heading', 'sage'), 'acfe_flexible_render_template' => 'flexbuilder/components/heading.php'])
                ->addFields(get_field_partial('flexbuilder.components.heading'))

            // Divider
            ->addLayout('divider', ['label' => __('Divider', 'sage')])
                ->addTruefalse('display_line', ['message' => __('Display Horizontal rule', 'sage')])

            // 1 Column small
            ->addLayout('1_column_sm', ['label' => __('1 Column Narrow', 'sage'), 'acfe_flexible_render_template' => 'flexbuilder/columns.php'])
                ->addGroup('col_1')
                    ->addFields(get_field_partial('flexbuilder.partials.column_content'))
                ->endGroup()

            // 1 Column
            ->addLayout('1_column', ['label' => __('1 Column', 'sage'), 'acfe_flexible_render_template' => 'flexbuilder/columns.php'])
                ->addGroup('col_1')
                    ->addFields(get_field_partial('flexbuilder.partials.column_content'))
                ->endGroup()

            // 2 Columns
            ->addLayout('2_columns', ['label' => __('2 Columns', 'sage'), 'acfe_flexible_render_template' => 'flexbuilder/columns.php'])
                ->addGroup('col_1')
                    ->addFields(get_field_partial('flexbuilder.partials.column_content'))
                ->endGroup()
                ->addGroup('col_2')
                    ->addFields(get_field_partial('flexbuilder.partials.column_content'))
                ->endGroup()

            // 3 Columns
            ->addLayout('3_columns', ['label' => __('3 Columns', 'sage'), 'acfe_flexible_render_template' => 'flexbuilder/columns.php'])
                ->addGroup('col_1')
                    ->addFields(get_field_partial('flexbuilder.partials.column_content'))
                ->endGroup()
                ->addGroup('col_2')
                    ->addFields(get_field_partial('flexbuilder.partials.column_content'))
                ->endGroup()
                ->addGroup('col_3')
                    ->addFields(get_field_partial('flexbuilder.partials.column_content'))
                ->endGroup()

            // 4 Columns
            ->addLayout('4_columns', ['label' => __('4 Columns', 'sage'), 'acfe_flexible_render_template' => 'flexbuilder/columns.php'])
                ->addGroup('col_1')
                    ->addFields(get_field_partial('flexbuilder.partials.column_content'))
                ->endGroup()
                ->addGroup('col_2')
                    ->addFields(get_field_partial('flexbuilder.partials.column_content'))
                ->endGroup()
                ->addGroup('col_3')
                    ->addFields(get_field_partial('flexbuilder.partials.column_content'))
                ->endGroup()
                ->addGroup('col_4')
                    ->addFields(get_field_partial('flexbuilder.partials.column_content'))
                ->endGroup()

            // Left wide columns
            ->addLayout('left_wide', ['label' => __('Left wide', 'sage'), 'acfe_flexible_render_template' => 'flexbuilder/columns.php'])
                ->addGroup('col_1')
                    ->addFields(get_field_partial('flexbuilder.partials.column_content'))
                ->endGroup()
                ->addGroup('col_2')
                    ->addFields(get_field_partial('flexbuilder.partials.column_content'))
                ->endGroup()

            // Right wide columns
            ->addLayout('right_wide', ['label' => __('Right wide', 'sage'), 'acfe_flexible_render_template' => 'flexbuilder/columns.php'])
                ->addGroup('col_1')
                    ->addFields(get_field_partial('flexbuilder.partials.column_content'))
                ->endGroup()
                ->addGroup('col_2')
                    ->addFields(get_field_partial('flexbuilder.partials.column_content'))
                ->endGroup()
        ->endFlexibleContent()

    // Column options
    ->addTab('column_options', ['placement' => 'left'])
        ->addCheckbox('column_options', ['label' => __('Options', 'sage'), 'allow_custom' => 1])
            ->addChoice('text-center', __('Center all text', 'sage'))
            ->addChoice('v-center', __('Vertical center', 'sage'));

return $columns;
