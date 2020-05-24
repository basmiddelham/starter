<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$posts = new FieldsBuilder('posts');
$posts

    // Content
    ->addTab('content', ['placement' => 'left'])
        ->addWysiwyg('intro', ['label' => __('Intro', 'strt')])

    // Row options
    ->addTab('row_options', ['placement' => 'left'])

        // Columns amount
        ->addRadio('post_columns', [
            'label' => __('Columns', 'strt'),
            'default_value' => 'col-md-3'
        ])
            ->addChoice('col-md-6', '2')
            ->addChoice('col-md-4', '3')
            ->addChoice('col-md-3', '4')

        // Post amount
        ->addSelect('post_amount', ['label' => __('Amount', 'strt')])
            ->addChoice('2','2')
            ->addChoice('3','3')
            ->addChoice('4','4')
            ->addChoice('6','6')
            ->addChoice('8','8')
            ->addChoice('9','9')
            ->addChoice('10','10')
            ->addChoice('12','12')
            ->addChoice('16','16')
            ->setDefaultValue('4')

        // Excerpt length
        ->addNumber('excerpt_length', [
            'label' => __('Excerpt length', 'strt'),
            'placeholder' => 280,
            'min' => 100,
            'max' => 560,
        ])

        // Post type (ACF Extend plugin required!)
        ->addField('post_type', 'acfe_post_types', [
            'label' => __('Post type', 'strt'),
            'default_value' => 'post',
            'field_type' => 'select'
        ])

        // Categories
        ->addTaxonomy('post_tax', [
            'label' => __('Category', 'strt'),
            'taxonomy' => 'category',
            'field_type' => 'multi_select',
            'add_term' => 0,
        ])
            ->conditional('post_type', '==', 'post')

        // Post options
        ->addCheckbox('post_options', [
            'label' => __('Posts options', 'strt'),
            'allow_custom' => 1,
            'save_custom' => 1,
            'default_value' => [
                0 => 'show_date',
                2 => 'show_cats',
            ]
        ])
            ->addChoice('show_date', __('Show date', 'strt'))
            ->addChoice('show_author', __('Show author', 'strt'))
            ->addChoice('show_cats', __('Show categories', 'strt'))
            ->addChoice('show_more', __('Show \'More posts\' button', 'strt'))

        // More button
        ->addGroup('button')
            ->conditional('post_options', '==', 'show_more')
            ->addFields(get_field_partial('flexbuilder.components.button'))
        ->endGroup();

return $posts;
