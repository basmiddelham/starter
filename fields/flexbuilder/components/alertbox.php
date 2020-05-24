<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$editor = new FieldsBuilder('alertbox');

$editor
    ->addWysiwyg('alertbox_editor', ['wrapper' => ['class' => 'autosize']])
    ->addSelect('alertbox_color')
        ->addChoice('alert-primary', 'Primary')
        ->addChoice('alert-secondary', 'Secondary')
        ->addChoice('alert-info', 'Info')
        ->addChoice('alert-success', 'Success')
        ->addChoice('alert-warning', 'Warning')
        ->addChoice('alert-danger', 'Danger')
        ->setDefaultValue('alert-primary');

return $editor;
