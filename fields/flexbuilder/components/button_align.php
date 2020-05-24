<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$button_align = new FieldsBuilder('button_align');
$button_align
    ->addSelect('button_align', ['label' => __('Alignment', 'strt')])
        ->addChoice('d-inline-block', __('Left', 'strt'))
        ->addChoice('d-table mx-auto', __('Center', 'strt'))
        ->addChoice('d-table ml-auto', __('Right', 'strt'))
        ->addChoice('btn-block', __('Block', 'strt'))
        ->setDefaultValue('d-inline-block');

return $button_align;
