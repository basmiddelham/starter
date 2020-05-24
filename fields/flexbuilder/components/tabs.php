<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$tabs = new FieldsBuilder('tabs');

$tabs
    ->addRepeater('tabs', [
        'layout' => 'block',
        'button_label' => __('Add tab', 'sage'),
        'collapsed' => 'title'
    ])
        ->addText('title', [
            'placeholder' => __('Title', 'sage')
        ])
        ->addWysiwyg('content', [
            'placeholder' => __('Text', 'sage'),
            'wrapper' => ['class' => 'autosize']
        ])
    ->endRepeater();

return $tabs;
