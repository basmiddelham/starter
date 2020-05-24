<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$item_list = new FieldsBuilder('item_list');
$item_list

    // Itemlist content
    ->addTab('content', ['placement' => 'left'])
        ->addAccordion('intro', ['label' => __('Intro (optional)', 'sage'), 'wrapper' => ['width' => '100']])
            ->addWysiwyg('intro', ['label' => __('Intro (optional)', 'sage'), 'placeholder' => __('Intro (optional)', 'sage'), 'wrapper' => ['class' => 'autosize']])
        ->addAccordion('intro_end', ['endpoint' => 1])
        ->addRepeater('list', ['button_label' => 'Add Item', 'layout' => 'block'])
            ->addImage('image', ['return_format' => 'id', 'preview_size' => 'medium', 'wrapper' => ['width' => '40']])
            ->addGroup('content', ['wrapper' => ['width' => '60']])
                ->addWysiwyg('editor', ['wrapper' => ['class' => 'autosize']])
                ->addFields(get_field_partial('flexbuilder.components.button_content'))
            ->endGroup()
        ->endRepeater()

    // Container Options
    ->addTab('container_options')
        ->addFields(get_field_partial('flexbuilder.partials.container_width'))
        ->addFields(get_field_partial('flexbuilder.partials.section_bg'))

    // Itemlist options
    ->addTab('item_list_options')

        // Layout
        ->addRadio('layout', ['label' =>  __('Layout', 'sage')])
            ->addChoice('columns', __('Columns', 'sage'))
            ->addChoice('rows', __('Rows', 'sage'))
            ->addChoice('wide_rows', __('Wide rows', 'sage'))

        // Column layout
        ->addSelect('column_amount', ['label' => __('Column amount', 'sage')])
            ->conditional('layout', '==', 'columns')
            ->addChoice('2')
            ->addChoice('3')
            ->addChoice('4')
            ->setDefaultValue('4')

        // Row layout
        ->addCheckbox('options', ['label' => __('Options', 'sage'), 'default_value' => [0 => 'alternate', 1 => 'lg-img']])
            ->conditional('layout', '==', 'rows')
            ->addChoice('alternate', __('Alternate rows', 'sage'))
            ->addChoice('lg-img', __('Large images', 'sage'))

        // Options
        ->addCheckbox('row_options', ['label' => __('Options', 'sage'), 'allow_custom' => 1])
            ->addChoice('text-center', __('Center all text', 'sage'))

        // Buttons
        ->addGroup('buttons', ['label' => __('Buttons', 'sage')])
            ->addFields(get_field_partial('flexbuilder.components.button_options'))
        ->endGroup()

        // Image shape
        ->addRadio('image_shape', ['label' =>  __('Image shape', 'sage')])
            ->conditional('layout', '==', 'columns')
                ->or('layout', '==', 'rows')
            ->addChoice('normal', __('Normal', 'sage'))
            ->addChoice('crop', __('Crop', 'sage'))
            ->addChoice('square', __('Square', 'sage'))
            ->addChoice('round', __('Round', 'sage'))
            ->setDefaultValue('crop');

return $item_list;
