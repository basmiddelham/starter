<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$accordion = new FieldsBuilder('accordion');

$accordion
    ->addRepeater('accordion', [
        'layout' => 'block',
        'button_label' => __('Add item', 'sage'),
        'collapsed' => 'title'
    ])
        ->addText('title', ['placeholder' => __('Title', 'sage')])
        ->addWysiwyg('content', ['wrapper' => ['class' => 'autosize']])
    ->endRepeater();

return $accordion;
