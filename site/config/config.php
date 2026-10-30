<?php

return [
    'debug' => false,
    'languages' => true,
    'smartypants' => true,
    'thumbs' => [
        'quality' => 78,
        'format' => 'webp',
    ],
    'cache' => [
        'pages' => [
            'active' => true,
            'ignore' => fn($page) => $page->isHomePage(),
        ],
    ],
    'panel' => [
        'css' => 'assets/css/panel.css'
    ]
];
