<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$button_group = new FieldsBuilder('button_group');
$button_group
    ->addSelect('button_group_align', ['label' => __('Alignment', 'strt'), 'wrapper' => ['width' => '50']])
        ->addChoice('', __('Left', 'strt'))
        ->addChoice('d-table mx-auto', __('Center', 'strt'))
        ->addChoice('d-table ml-auto', __('Right', 'strt'))
        ->setDefaultValue('d-table mx-auto')
    ->addSelect('button_group_size', ['label' => __('Size', 'strt'), 'wrapper' => ['width' => '50']])
        ->addChoice('btn-sm', __('Small', 'strt'))
        ->addChoice('btn-md', __('Standard', 'strt'))
        ->addChoice('btn-lg', __('Large', 'strt'))
        ->setDefaultValue('btn-md')
    ->addRepeater('button_group', ['layout' => 'block', 'button_label' => __('Add button', 'strt')])
        ->addFields(get_field_partial('flexbuilder.components.button_content'))
        ->addFields(get_field_partial('flexbuilder.components.button_color'))
    ->endRepeater();

return $button_group;
