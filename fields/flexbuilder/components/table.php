<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$table = new FieldsBuilder('table');

$table
    ->addField('table', 'table', ['use_header' => 0])
    ->addCheckbox('table_options', ['layout' => 'horizontal'])
        -> addChoice('table-sm', 'Use small table')
        -> addChoice('table-borderless', 'No borders');

return $table;
