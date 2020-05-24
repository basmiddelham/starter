<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$video = new FieldsBuilder('video');

$video
    ->addRadio('video_type', ['label' =>  __('Layout', 'sage'), 'type' => 'button_group', 'wrapper' => ['width' => '50']])
        ->addChoice('embed', __('Embed', 'sage'))
        ->addChoice('mp4', __('MP4', 'sage'))
        ->setDefaultValue('embed')
    ->addSelect('video_aspect', ['default_value' => [0 => '16by9'], 'wrapper' => ['width' => '50']])
        ->conditional('video_type', '==', 'embed')
        ->addChoice('21by9')
        ->addChoice('16by9')
        ->addChoice('4by3')
    ->addOembed('embed_link')
        ->conditional('video_type', '==', 'embed')
    ->addFile('mp4_file', ['acfe_uploader' => 'wp', 'return_format' => 'url'])
        ->conditional('video_type', '==', 'mp4')
    ->addCheckbox('mp4_options', [
        'label' =>  __('Options', 'sage'),
        'layout' => 'horizontal',
        'default_value' => [
            0 => 'controls'
        ]
    ])
        ->conditional('video_type', '==', 'mp4')
        ->addChoice('controls', __('Controls', 'sage'))
        ->addChoice('preload', __('Preload', 'sage'))
        ->addChoice('loop', __('Loop', 'sage'))
        ->addChoice('muted autoplay', __('Autoplay', 'sage'));

return $video;
