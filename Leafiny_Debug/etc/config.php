<?php

$config = [
    'app' => [
        'twig_filters' => [
            'debug' => Debug_Twig_Filters::class,
        ],
    ],

    'block' => [
        'debug.container' => [
            'template' => 'Leafiny_Debug::block/debug/container.twig',
            'class'    => Debug_Block_Container::class
        ],
        'debug.container.style' => [
            'template' => 'Leafiny_Debug::block/debug/container/style.twig'
        ],
        'debug.container.object' => [
            'template' => 'Leafiny_Debug::block/debug/container/object.twig'
        ]
    ],

    'observer' => [
        'object_init_after' => [
            'debug_object_add' => 10000,
        ],
        'page_render_after' => [
            'debug_print_data' => 10000,
        ],
    ],

    'event' => [
        'debug' => [
            'class' => Debug_Model_Debug::class
        ],
        'debug_object_add' => [
            'class' => Debug_Observer_Add::class
        ],
        'debug_print_data' => [
            'class' => Debug_Observer_Print::class
        ],
    ],
];
