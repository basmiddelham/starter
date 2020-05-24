<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$section_options = new FieldsBuilder('section_options');
$section_options
    ->addRadio('section_width', ['label' => __('Section width', 'sage')])
        ->addChoice('container-fluid', __('Wide', 'sage'))
        ->addChoice('container', __('Standard', 'sage'))
        ->addChoice('container -sm', __('Narrow', 'sage'))
        ->addChoice('container -xs', __('Extra narrow', 'sage'))
        ->setDefaultValue('container')
    ->addRadio('section_bg', ['label' => __('Background', 'sage')])
        ->addChoice('', __('None', 'sage'))
        ->addChoice('bg-primary', __('Primary', 'sage'))
        ->addChoice('bg-secondary', __('Secondary', 'sage'))
        ->addChoice('bg-light', __('Light', 'sage'))
        ->addChoice('bg-dark', __('Dark', 'sage'))
        ->addChoice('bg-img', __('Background image', 'sage'))
        ->setDefaultValue('')
    ->addImage('section_bg_image', ['return_format' => 'id', 'label' => __('Background image', 'sage'), 'preview_size' => 'thumbnail'])
        ->conditional('section_bg', '==', 'bg-img')
    ->addTrueFalse('section_bg_repeat', ['label' => __('Background repeat', 'sage'), 'ui' => 1])
        ->conditional('section_bg', '==', 'bg-img')
    ->addButtonGroup('section_color', ['label' => __('Text color', 'sage')])
        ->addChoice('', __('Standard', 'sage'))
        ->addChoice('text-white', __('White', 'sage'))
        ->addChoice('text-light', __('Light', 'sage'))
        ->conditional('section_bg', '!=', '');

add_action('acf/init', function() use ($section_options) {
    acf_add_local_field_group($section_options->build());
});