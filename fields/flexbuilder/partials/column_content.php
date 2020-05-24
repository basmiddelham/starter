<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$content = new FieldsBuilder('content');
$content
    ->addFlexibleContent('content', [
        'button_label' => __('Add content', 'strt'),
        'acfe_flexible_advanced' => 1,
        'acfe_flexible_title_edition' => 1,
        'acfe_flexible_clone' => 1,
        'acfe_flexible_copy_paste' => 1,
        'acfe_flexible_close_button' => 1,
        'acfe_flexible_layouts_templates' => 1,
        'acfe_flexible_layouts_previews' => 1,
        'acfe_flexible_layouts_ajax' => 1,
    ])
        ->addLayout(get_field_partial('flexbuilder.components.table'), ['
            label' => __('Table', 'strt'),
            'acfe_flexible_render_template' => 'flexbuilder/partials/column_content.php'
        ])
        ->addLayout(get_field_partial('flexbuilder.components.tabs'), [
            'label' => __('Tabs', 'strt'),
            'acfe_flexible_render_template' => 'flexbuilder/partials/column_content.php'
        ])
        ->addLayout(get_field_partial('flexbuilder.components.accordion'), [
            'label' => __('Accordion', 'strt'),
            'acfe_flexible_render_template' => 'flexbuilder/partials/column_content.php',
        ])
        ->addLayout(get_field_partial('flexbuilder.components.video'), [
            'label' => __('Video', 'strt'),
            'acfe_flexible_render_template' => 'flexbuilder/partials/column_content.php'
        ])
        ->addLayout(get_field_partial('flexbuilder.components.alertbox'), [
            'label' => __('Alertbox', 'strt'),
            'acfe_flexible_render_template' => 'flexbuilder/partials/column_content.php'
        ])
        ->addLayout(get_field_partial('flexbuilder.components.gallery'), [
            'label' => __('Gallery', 'strt'),
            'acfe_flexible_render_template' => 'flexbuilder/partials/column_content.php'
        ])
        ->addLayout(get_field_partial('flexbuilder.components.button_group'), [
            'label' => __('Button group', 'strt'),
            'acfe_flexible_render_template' => 'flexbuilder/partials/column_content.php'
        ])
        ->addLayout(get_field_partial('flexbuilder.components.button'), [
            'label' => __('Button', 'strt'),
            'acfe_flexible_render_template' => 'flexbuilder/partials/column_content.php'
        ])
        ->addLayout(get_field_partial('flexbuilder.components.image'), [
            'label' => __('Image', 'strt'),
            'acfe_flexible_render_template' => 'flexbuilder/partials/column_content.php'
        ])
        ->addLayout(get_field_partial('flexbuilder.components.heading'), [
            'label' => __('Heading', 'strt'),
            'acfe_flexible_render_template' => 'flexbuilder/partials/column_content.php'
        ])
        ->addLayout(get_field_partial('flexbuilder.components.editor'), [
            'label' => __('Text Editor', 'strt'),
            'acfe_flexible_render_template' => 'flexbuilder/partials/column_content.php'
        ])
    ->endFlexibleContent();

return $content;
