<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$button_size = new FieldsBuilder('button_size');
$button_size
    ->addSelect('button_size', ['label' => __('Size', 'sage')])
        ->addChoice('btn-sm', __('Small', 'sage'))
        ->addChoice('', __('Standard', 'sage'))
        ->addChoice('btn-lg', __('Large', 'sage'))
        ->setDefaultValue('');

return $button_size;
