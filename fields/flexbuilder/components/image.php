<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$image = new FieldsBuilder('image');

$image
    ->addImage('image', ['return_format' => 'id', 'preview_size' => 'one_half'])
    ->addSelect('size', ['label' => __('Size', 'strt'), 'required' => 1, 'wrapper' => ['width' => '50']])
        ->addChoice('', __('Choose a size', 'strt'))
        ->addChoice('one_fourth', __('1/4', 'strt'))
        ->addChoice('one_fourth_square', __('1/4 Square', 'strt'))
        ->addChoice('one_third', __('1/3', 'strt'))
        ->addChoice('one_third_square', __('1/3 Square', 'strt'))
        ->addChoice('two_third', __('2/3', 'strt'))
        ->addChoice('one_half', __('1/2', 'strt'))
        ->addChoice('one_half_square', __('1/2 Square', 'strt'))
        ->addChoice('one', __('1/1', 'strt'))
        ->setDefaultValue('')
    ->addTruefalse('link', ['label' => __('Link to large?', 'strt'), 'message' => __('Link to large?', 'strt'), 'wrapper' => ['width' => '50']]);

return $image;
