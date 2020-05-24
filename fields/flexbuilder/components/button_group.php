<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$button_group = new FieldsBuilder('button_group');
$button_group
    ->addSelect('button_group_align', ['label' => __('Alignment', 'sage'), 'wrapper' => ['width' => '50']])
        ->addChoice('', __('Left', 'sage'))
        ->addChoice('d-table mx-auto', __('Center', 'sage'))
        ->addChoice('d-table ml-auto', __('Right', 'sage'))
        ->setDefaultValue('d-table mx-auto')
    ->addSelect('button_group_size', ['label' => __('Size', 'sage'), 'wrapper' => ['width' => '50']])
        ->addChoice('btn-sm', __('Small', 'sage'))
        ->addChoice('btn-md', __('Standard', 'sage'))
        ->addChoice('btn-lg', __('Large', 'sage'))
        ->setDefaultValue('btn-md')
    ->addRepeater('button_group', ['layout' => 'block', 'button_label' => __('Add button', 'sage')])
        ->addFields(get_field_partial('flexbuilder.components.button_content'))
        ->addFields(get_field_partial('flexbuilder.components.button_color'))
    ->endRepeater();

return $button_group;
