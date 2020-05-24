<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$pageheader = new FieldsBuilder('pageheader');
$pageheader

    ->addText('heading', ['label' => __('Heading', 'strt')])
    ->addWysiwyg('text', ['label' => __('Text (optional)', 'strt'), 'wrapper' => ['width' => 50]])
    ->addImage('image', [
        'label' => __('Image (optional)', 'strt'), 
        'wrapper' => ['width' => 50],
        'return_format' => 'id',
        'preview_size' => 'one_half'
    ]);

return $pageheader;
