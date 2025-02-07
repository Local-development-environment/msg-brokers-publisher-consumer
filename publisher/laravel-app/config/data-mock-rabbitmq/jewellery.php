<?php

return [
//    [
        'data' => [
            'type' => 'jewelleries',
            'attributes' => [
                'prcs_metal_sample' => 925,
                'prcs_metal_colour' => 'белый',
                'prcs_metal' => 'серебро',
                'jewellery_category' => 'браслет',
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
                'ring_props' => [
                    'sizes' => []
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
                'brooch_props' => [],
                'tie_clip_props' => [],
                'chain_props' => [
                    'sizes' => [],
                    'weaving' => []
                ],
                'cuff_link_props' => [],
                'necklace_props' => [
                    'sizes' => [],
                ],
                'pendant_props' => [],
                'charm_pendant_props' => [],
                'piercing_props' => [],
                'earring_props' => []
            ]
        ]
//    ]
];
