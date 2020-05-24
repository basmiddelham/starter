<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$heading = new FieldsBuilder('heading');
$heading
    ->addText('heading_text')
    ->addButtongroup('heading_size')
        ->addChoice('1', __('H1', 'sage'))
        ->addChoice('2', __('H2', 'sage'))
        ->addChoice('3', __('H3', 'sage'))
        ->addChoice('4', __('H4', 'sage'))
        ->setDefaultValue('2')

    ->addButtongroup('display_size', ['allow_null' => 1])
        ->addChoice('1', __('D1', 'sage'))
        ->addChoice('2', __('D2', 'sage'))
        ->addChoice('3', __('D3', 'sage'))
        ->addChoice('4', __('D4', 'sage'));

return $heading;
