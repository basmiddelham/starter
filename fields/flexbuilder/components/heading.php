<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$heading = new FieldsBuilder('heading');
$heading
    ->addText('heading_text')
    ->addButtongroup('heading_size')
        ->addChoice('1', 'H1')
        ->addChoice('2', 'H2')
        ->addChoice('3', 'H3')
        ->addChoice('4', 'H4')
        ->setDefaultValue('2')

    ->addButtongroup('display_size', ['allow_null' => 1])
        ->addChoice('1', 'D1')
        ->addChoice('2', 'D2')
        ->addChoice('3', 'D3')
        ->addChoice('4', 'D4');

return $heading;
