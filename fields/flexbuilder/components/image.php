<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$image = new FieldsBuilder('image');

$image
    ->addImage('image', ['return_format' => 'id', 'preview_size' => 'one_half'])
    ->addSelect('size', ['label' => __('Size', 'sage'), 'required' => 1, 'wrapper' => ['width' => '50']])
        ->addChoice('', __('Choose a size', 'sage'))
        ->addChoice('one_fourth', __('1/4', 'sage'))
        ->addChoice('one_fourth_square', __('1/4 Square', 'sage'))
        ->addChoice('one_third', __('1/3', 'sage'))
        ->addChoice('one_third_square', __('1/3 Square', 'sage'))
        ->addChoice('two_third', __('2/3', 'sage'))
        ->addChoice('one_half', __('1/2', 'sage'))
        ->addChoice('one_half_square', __('1/2 Square', 'sage'))
        ->addChoice('one', __('1/1', 'sage'))
        ->setDefaultValue('')
    ->addTruefalse('link', ['label' => __('Link to large?', 'sage'), 'message' => __('Link to large?', 'sage'), 'wrapper' => ['width' => '50']]);

return $image;
