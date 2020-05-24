<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$button_size = new FieldsBuilder('button_size');
$button_size
    ->addSelect('button_size', ['label' => __('Size', 'strt')])
        ->addChoice('btn-sm', __('Small', 'strt'))
        ->addChoice('', __('Standard', 'strt'))
        ->addChoice('btn-lg', __('Large', 'strt'))
        ->setDefaultValue('');

return $button_size;
