<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$section_bg = new FieldsBuilder('section_bg');
$section_bg
    ->addRadio('section_bg', ['label' => __('Background', 'strt')])
        ->addChoice('', __('None', 'strt'))
        ->addChoice('bg-primary', __('Primary', 'strt'))
        ->addChoice('bg-secondary text-light', __('Secondary', 'strt'))
        ->addChoice('bg-light', __('Light', 'strt'))
        ->addChoice('bg-dark text-light', __('Dark', 'strt'))
        ->addChoice('bg-img', __('Background image', 'strt'))
        ->setDefaultValue('')
    ->addImage('bg_image', ['return_format' => 'id', 'label' => __('Background image', 'strt'), 'preview_size' => 'thumbnail'])
        ->conditional('section_bg', '==', 'bg-img')
    ->addTrueFalse('bg_repeat', ['label' => __('Background repeat', 'strt'), 'ui' => 1])
        ->conditional('section_bg', '==', 'bg-img');

return $section_bg;
