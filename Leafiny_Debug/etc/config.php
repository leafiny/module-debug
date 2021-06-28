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
        ],
        'debug.container.query' => [
            'template' => 'Leafiny_Debug::block/debug/container/query.twig'
        ]
    ],

    'events' => [
        'object_init_after' => [
            'debug_object_add' => 10000,
        ],
        'page_render_after' => [
            'debug_print_data' => 10000,
        ],
        'model_object_init_after' => [
            'debug_db_queries' => 10000,
        ]
    ],

    'observer' => [
        'debug' => [
            'class' => Debug_Model_Debug::class
        ],
        'debug_db_queries' => [
            'class' => Debug_Observer_Queries::class
        ],
        'debug_object_add' => [
            'class' => Debug_Observer_Add::class
        ],
        'debug_print_data' => [
            'class' => Debug_Observer_Print::class
        ],
    ],
];
