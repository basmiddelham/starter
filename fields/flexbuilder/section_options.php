<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$section_options = new FieldsBuilder('section_options');
$section_options
    ->addRadio('section_width', ['label' => __('Section width', 'strt')])
        ->addChoice('container-fluid', __('Wide', 'strt'))
        ->addChoice('container', __('Standard', 'strt'))
        ->addChoice('container -sm', __('Narrow', 'strt'))
        ->addChoice('container -xs', __('Extra narrow', 'strt'))
        ->setDefaultValue('container')
    ->addRadio('section_bg', ['label' => __('Background', 'strt')])
        ->addChoice('', __('None', 'strt'))
        ->addChoice('bg-primary', __('Primary', 'strt'))
        ->addChoice('bg-secondary', __('Secondary', 'strt'))
        ->addChoice('bg-light', __('Light', 'strt'))
        ->addChoice('bg-dark', __('Dark', 'strt'))
        ->addChoice('bg-img', __('Background image', 'strt'))
        ->setDefaultValue('')
    ->addImage('section_bg_image', ['return_format' => 'id', 'label' => __('Background image', 'strt'), 'preview_size' => 'thumbnail'])
        ->conditional('section_bg', '==', 'bg-img')
    ->addTrueFalse('section_bg_repeat', ['label' => __('Background repeat', 'strt'), 'ui' => 1])
        ->conditional('section_bg', '==', 'bg-img')
    ->addButtonGroup('section_color', ['label' => __('Text color', 'strt')])
        ->addChoice('', __('Standard', 'strt'))
        ->addChoice('text-white', __('White', 'strt'))
        ->addChoice('text-light', __('Light', 'strt'))
        ->conditional('section_bg', '!=', '');

add_action('acf/init', function() use ($section_options) {
    acf_add_local_field_group($section_options->build());
});