<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$button_options = new FieldsBuilder('button_options');
$button_options
    ->addFields(get_field_partial('flexbuilder.components.button_color'))
    ->addFields(get_field_partial('flexbuilder.components.button_size'))
    ->addFields(get_field_partial('flexbuilder.components.button_align'));

return $button_options;
