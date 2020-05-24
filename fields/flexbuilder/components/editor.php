<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$editor = new FieldsBuilder('editor');

$editor
    ->addWysiwyg('editor');

return $editor;
