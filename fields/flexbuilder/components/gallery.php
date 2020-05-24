<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$gallery = new FieldsBuilder('gallery');
$gallery
    ->addGallery('gallery', ['preview_size' => 'thumbnail', 'return_format' => 'id'])
    ->addSelect('gallery_columns', ['wrapper' => ['width' => '33']])
        ->addChoice('1', '1 Column', 'sage')
        ->addChoice('2', '2 Columns', 'sage')
        ->addChoice('3', '3 Columns', 'sage')
        ->addChoice('4', '4 Columns', 'sage')
        ->addChoice('5', '5 Columns', 'sage')
        ->addChoice('6', '6 Columns', 'sage')
        ->setDefaultValue('3')
    ->addSelect('gallery_size', ['wrapper' => ['width' => '33']])
        ->addChoice('thumbnail', 'Thumbnail', 'sage')
        ->addChoice('one_fourth', '1/4', 'sage')
        ->addChoice('one_fourth_crop', '1/4 Landscape', 'sage')
        ->addChoice('one_fourth_square', '1/4 Square', 'sage')
        ->addChoice('one_third', '1/3', 'sage')
        ->addChoice('one_third_crop', '1/3 Landscape', 'sage')
        ->addChoice('one_third_square', '1/3 Square', 'sage')
        ->addChoice('one_half', '1/2', 'sage')
        ->addChoice('one_half_crop', '1/2 Landscape', 'sage')
        ->addChoice('one_half_square', '1/2 Square', 'sage')
        ->addChoice('one', 'Full', 'sage')
        ->setDefaultValue('medium')
    ->addSelect('gallery_link', ['wrapper' => ['width' => '33']])
        ->addChoice('none', 'None', 'sage')
        ->addChoice('file', 'File', 'sage')
        ->setDefaultValue('none');

return $gallery;
