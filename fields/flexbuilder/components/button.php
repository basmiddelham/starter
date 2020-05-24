<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$button = new FieldsBuilder('button');
$button
    ->addLink('button_link', ['label' => __('Button link', 'sage')])
    ->addFields(get_field_partial('flexbuilder.components.button_color'))
    ->addFields(get_field_partial('flexbuilder.components.button_size'))
    ->addFields(get_field_partial('flexbuilder.components.button_align'));

return $button;
