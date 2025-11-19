<?php
declare(strict_types=1);

return [
    'medias' => [
        'jw_video_types' => [
            [
                'name' => 'video/ogv', 'extension' => 'ogv'
            ],
            [
                'name' => 'video/webm', 'extension' => 'webm'
            ],
            [
                'name' => 'video/mp4', 'extension' => 'mp4'
            ]
        ],
        'jw_media_producers' => [
            'менеджер', 'клиент'
        ]
    ],
    'body_parts' => [
        'запястье', 'щиколотка'
    ],
    'ring_fingers' => [
        'палец руки', 'палец ноги'
    ],

    'jw_promotions' => [
        [
            'name' => 'аутлет 70%',
            'rate' => 0.7,
            'description' => '',
        ],
        [
            'name' => 'золото и серебро 55%',
            'rate' => 0.55,
            'description' => '',
        ],
        [
            'name' => 'бриллианты 45%',
            'rate' => 0.45,
            'description' => '',
        ],
        [
            'name' => 'онлайн 40%',
            'rate' => 0.4,
            'description' => '',
        ],
        [
            'name' => 'бонусы 40%',
            'rate' => 0.4,
            'description' => '',
        ],
        [
            'name' => 'шок цена',
            'rate' => 0,
            'description' => '',
        ],
    ]
];
