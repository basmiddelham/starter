<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$container_width = new FieldsBuilder('container_width');
$container_width
    ->addRadio('container_width', ['label' => __('Container', 'sage')])
        ->addChoice('container-fluid', __('Wide', 'sage'))
        ->addChoice('container', __('Normal', 'sage'))
        ->addChoice('container -sm', __('Narrow', 'sage'))
        ->addChoice('container -xs', __('Extra narrow', 'sage'))
        ->setDefaultValue('container');

return $container_width;
