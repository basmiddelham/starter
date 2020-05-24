<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$gallery = new FieldsBuilder('gallery');
$gallery
    ->addGallery('gallery', ['preview_size' => 'thumbnail', 'return_format' => 'id'])
    ->addSelect('gallery_columns', ['wrapper' => ['width' => '33']])
        ->addChoice('1', '1 Column', 'strt')
        ->addChoice('2', '2 Columns', 'strt')
        ->addChoice('3', '3 Columns', 'strt')
        ->addChoice('4', '4 Columns', 'strt')
        ->addChoice('5', '5 Columns', 'strt')
        ->addChoice('6', '6 Columns', 'strt')
        ->setDefaultValue('3')
    ->addSelect('gallery_size', ['wrapper' => ['width' => '33']])
        ->addChoice('thumbnail', 'Thumbnail', 'strt')
        ->addChoice('one_fourth', '1/4', 'strt')
        ->addChoice('one_fourth_crop', '1/4 Landscape', 'strt')
        ->addChoice('one_fourth_square', '1/4 Square', 'strt')
        ->addChoice('one_third', '1/3', 'strt')
        ->addChoice('one_third_crop', '1/3 Landscape', 'strt')
        ->addChoice('one_third_square', '1/3 Square', 'strt')
        ->addChoice('one_half', '1/2', 'strt')
        ->addChoice('one_half_crop', '1/2 Landscape', 'strt')
        ->addChoice('one_half_square', '1/2 Square', 'strt')
        ->addChoice('one', 'Full', 'strt')
        ->setDefaultValue('medium')
    ->addSelect('gallery_link', ['wrapper' => ['width' => '33']])
        ->addChoice('none', 'None', 'strt')
        ->addChoice('file', 'File', 'strt')
        ->setDefaultValue('none');

return $gallery;
