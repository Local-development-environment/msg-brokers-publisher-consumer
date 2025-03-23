<?php

return [
    [
        'data' => [
            'type' => 'jewelleries',
            'attributes' => [
                'prcs_metal_sample' => 925,
                'prcs_metal_colour' => 'белый',
                'prcs_metal' => 'серебро',
                'jewellery_category' => 'цепи',
                'name' => 'Цепь из серебра, плетение Бисмарк, 925 проба',
                'description' => 'Цепь из серебра, плетение Бисмарк без вставок',
                'part_number' => '552020702',
                'approx_weight' => '8.47 грамма',
                'is_active' => 1
            ],
            'relationships' => [
                'coverages' => ['родирование']
            ]
        ]
    ],
    [
        'data' => [
            'type' => 'jewelleries',
            'attributes' => [
                'prcs_metal_sample' => 925,
                'prcs_metal_colour' => 'белый',
                'prcs_metal' => 'серебро',
                'jewellery_category' => 'браслеты',
                'name' => 'Браслет из серебра с фианитами',
                'description' => 'Браслет из серебра с фианитами',
                'part_number' => '94051012',
                'approx_weight' => '1.95 грамма',
                'is_active' => 1
            ],
            'relationships' => [
                'coverages' => [
                    'родирование'
                ],
                'inserts' => [
                    [
                        'stone' => 'фианит',
                        'stone_type' => 'полудрагоценный',
                        'insert_shape' => 'круг',
                        'insert_colour' => 'бесцветный',
                        'insert_property' => [
                            'quantity' => 20,
                            'weight' => 0.17,
                            'dimensions' => ['диаметр' => '1 мм']
                        ],
                    ]
                ],
                'bracelet_props' => [
                    'body_part' => 'для рук',
                    'sizes' => [
                        [
                            'size' => 16.00,
                            'unit' => 'см',
                            'quantity' => 5,
                            'price' => 1790.00,
                        ],
                        [
                            'size' => 17.00,
                            'unit' => 'см',
                            'quantity' => 5,
                            'price' => 1790.00,
                        ],
                        [
                            'size' => 18.00,
                            'unit' => 'см',
                            'quantity' => 5,
                            'price' => 1790.00,
                        ],
                        [
                            'size' => 19.00,
                            'unit' => 'см',
                            'quantity' => 5,
                            'price' => 1790.00,
                        ],
                    ],
                    'weavings' => []
                ],
            ]
        ]
    ],
    [
        'data' => [
            'type' => 'jewelleries',
            'attributes' => [
                'prcs_metal_sample' => 585,
                'prcs_metal_colour' => 'красный',
                'prcs_metal' => 'золото',
                'jewellery_category' => 'кольца',
                'name' => 'Кольцо из золота',
                'description' => 'Кольцо из красного золота',
                'part_number' => '019424',
                'approx_weight' => '1.09 грамма',
                'is_active' => 1
            ],
            'relationships' => [
                'coverages' => [
                    'алмазная грань'
                ],
                'inserts' => [
                    []
                ],
                'ring_props' => [
                    'sizes' => []
                ],
            ]
        ]
    ]
];
