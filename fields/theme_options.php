<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$layout_previews = new FieldsBuilder('layout_previews', [
    'title' => __('Layout previews', 'strt'),
    'label_placement' => 'left',
]);

$layout_previews
    ->setLocation('options_page', '==', 'admin-options')
    ->addText('texty')
    ->addGroup('layout_previews')
        ->addImage('layout_preview_1', ['preview_size' => 'thumbnail'])
        ->addImage('layout_preview_2', ['preview_size' => 'thumbnail'])
        ->addImage('layout_preview_3', ['preview_size' => 'thumbnail'])
    ->endGroup();
return $layout_previews;
