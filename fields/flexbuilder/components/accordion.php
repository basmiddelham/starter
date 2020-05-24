<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$accordion = new FieldsBuilder('accordion');

$accordion
    ->addRepeater('accordion', [
        'layout' => 'block',
        'button_label' => __('Add item', 'strt'),
        'collapsed' => 'title'
    ])
        ->addText('title', ['placeholder' => __('Title', 'strt')])
        ->addWysiwyg('content', ['wrapper' => ['class' => 'autosize']])
    ->endRepeater();

return $accordion;
