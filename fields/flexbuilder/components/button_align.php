<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$button_align = new FieldsBuilder('button_align');
$button_align
    ->addSelect('button_align', ['label' => __('Alignment', 'sage')])
        ->addChoice('d-inline-block', __('Left', 'sage'))
        ->addChoice('d-table mx-auto', __('Center', 'sage'))
        ->addChoice('d-table ml-auto', __('Right', 'sage'))
        ->addChoice('btn-block', __('Block', 'sage'))
        ->setDefaultValue('d-inline-block');

return $button_align;
