<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$container_width = new FieldsBuilder('container_width');
$container_width
    ->addRadio('container_width', ['label' => __('Container', 'strt')])
        ->addChoice('container-fluid', __('Wide', 'strt'))
        ->addChoice('container', __('Normal', 'strt'))
        ->addChoice('container -sm', __('Narrow', 'strt'))
        ->addChoice('container -xs', __('Extra narrow', 'strt'))
        ->setDefaultValue('container');

return $container_width;
