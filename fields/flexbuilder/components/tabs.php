<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$tabs = new FieldsBuilder('tabs');

$tabs
    ->addRepeater('tabs', [
        'layout' => 'block',
        'button_label' => __('Add tab', 'strt'),
        'collapsed' => 'title'
    ])
        ->addText('title', [
            'placeholder' => __('Title', 'strt')
        ])
        ->addWysiwyg('content', [
            'placeholder' => __('Text', 'strt'),
            'wrapper' => ['class' => 'autosize']
        ])
    ->endRepeater();

return $tabs;
