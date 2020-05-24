<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

require_once get_template_directory() . '/fields/flexbuilder/section_options.php';

$flexbuilder = new FieldsBuilder('fb', [
    'style'          => 'seamless',
    'hide_on_screen' => [0 => 'the_content']
]);

$flexbuilder
    ->setLocation('page_template', '==', 'page-flexbuilder.php')
    ->addFlexibleContent('section', [
        'button_label' => __('Add Section', 'strt'),
        'acfe_flexible_layouts_placeholder' => 1,
        'acfe_flexible_advanced' => 1,
        'acfe_flexible_title_edition' => 1,
        'acfe_flexible_clone' => 1,
        'acfe_flexible_copy_paste' => 1,
        'acfe_flexible_close_button' => 1,
        'acfe_flexible_layouts_templates' => 1,
        'acfe_flexible_layouts_previews' => 1,
        'acfe_flexible_layouts_settings' => 1,
        'acfe_flexible_layouts_ajax' => 1,
    ])

        // Pageheader
        ->addLayout(get_field_partial('flexbuilder.pageheader'), [
            'label' => __('Pageheader', 'strt'),
            'acfe_flexible_render_template' => 'flexbuilder/flexbuilder.php',
            'acfe_flexible_settings_size' => 'medium',
            'acfe_flexible_settings' => array(
                0 => 'group_section_options',
            ),
        ])

        // Columns
        ->addLayout(get_field_partial('flexbuilder.columns'), [
            'label' => __('Columns', 'strt'),
            'acfe_flexible_render_template' => 'flexbuilder/flexbuilder.php',
            'acfe_flexible_settings_size' => 'medium',
            'acfe_flexible_settings' => array(
                0 => 'group_section_options',
            ),
        ])

        // Posts
        ->addLayout(get_field_partial('flexbuilder.posts'), ['
            label' => __('Posts', 'strt'),
            'acfe_flexible_render_template' => 'flexbuilder/flexbuilder.php',
            'acfe_flexible_settings_size' => 'medium',
            'acfe_flexible_settings' => array(
                0 => 'group_section_options',
            ),
        ])

        // Item Lists
        ->addLayout(get_field_partial('flexbuilder.item_list'), [
            'label' => __('Item list', 'strt'),
            'acfe_flexible_render_template' => 'flexbuilder/flexbuilder.php',
            'acfe_flexible_settings_size' => 'medium',
            'acfe_flexible_settings' => array(
                0 => 'group_section_options',
            ),
        ])
    ->endFlexibleContent();

add_action('acf/init', function() use ($flexbuilder) {
    acf_add_local_field_group($flexbuilder->build());
});