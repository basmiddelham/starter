<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$pageheader = new FieldsBuilder('pageheader');
$pageheader

    ->addText('heading', ['label' => __('Heading', 'sage')])
    ->addWysiwyg('text', ['label' => __('Text (Optional)', 'sage'), 'wrapper' => ['width' => 50]])
    ->addImage('image', [
        'label' => __('Image (Optional)', 'sage'), 
        'wrapper' => ['width' => 50],
        'return_format' => 'id',
        'preview_size' => 'one_half'
    ]);

return $pageheader;
