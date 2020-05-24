<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$section_bg = new FieldsBuilder('section_bg');
$section_bg
    ->addRadio('section_bg', ['label' => __('Background', 'sage')])
        ->addChoice('', __('None', 'sage'))
        ->addChoice('bg-primary', __('Primary', 'sage'))
        ->addChoice('bg-secondary text-light', __('Secondary', 'sage'))
        ->addChoice('bg-light', __('Light', 'sage'))
        ->addChoice('bg-dark text-light', __('Dark', 'sage'))
        ->addChoice('bg-img', __('Background image', 'sage'))
        ->setDefaultValue('')
    ->addImage('bg_image', ['return_format' => 'id', 'label' => __('Background image', 'sage'), 'preview_size' => 'thumbnail'])
        ->conditional('section_bg', '==', 'bg-img')
    ->addTrueFalse('bg_repeat', ['label' => __('Background repeat', 'sage'), 'ui' => 1])
        ->conditional('section_bg', '==', 'bg-img');

return $section_bg;
