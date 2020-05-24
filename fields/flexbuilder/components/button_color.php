<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$button_color = new FieldsBuilder('button_color');
$button_color
    ->addSelect('button_color', ['label' => __('Color', 'sage')])
        ->addChoice('btn-primary', __('Primary', 'sage'))
        ->addChoice('btn-outline-primary', __('Primary outline', 'sage'))
        ->addChoice('btn-secondary', __('Secondary', 'sage'))
        ->addChoice('btn-outline-secondary', __('Secondary outline', 'sage'))
        ->addChoice('btn-light', __('Light', 'sage'))
        ->addChoice('btn-outline-light', __('Light outline', 'sage'))
        ->addChoice('btn-dark', __('Dark', 'sage'))
        ->addChoice('btn-outline-dark', __('Dark outline', 'sage'))
        ->setDefaultValue('btn-primary');

return $button_color;
