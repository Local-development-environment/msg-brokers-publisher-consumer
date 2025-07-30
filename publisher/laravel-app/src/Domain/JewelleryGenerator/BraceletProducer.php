<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator;

final class BraceletProducer implements JewelleryProducerInterface
{
    public function createJewellery(): array
    {

        return [
            'jewellery' => [
                [
                    'prcs_metal_prop' => [
                        'prcs_metal' => 'золото',
                        'prcs_metal_sample' => 585,
                        'prcs_metal_colour' => 'белый',
                    ],
                    'jewellery_category' => 'браслеты',
                    'coverage-jewellery' => [],
                    'name' => 'Браслет из белого золота с бриллиантами',
                    'description' => '',
                    'part_number' => '1050166-3',
                    'approx_weight' => '5.4 грамма',
                    'is_active' => true,
                    'discounts' => [
                        'name-function' => 'getDiscounts',
                        'parameters' => ['аутлет 70%'],
                    ],
                    'props' => [
                        'name-function' => 'getBraceletProps',
                        'parameters' =>
                            [
                                'clasp' => 'карабин',
                                'weaving' => [],
                                'body_part' => 'на руку',
                                'bracelet_sizes' => [17, 18, 19],
                                'quantity' => 5,
                                'price' => [499990, 500190, 500390]
                            ]
                    ],
                    'insert-jewellery' => [
                        [
                            'stone' => 'бриллиант',
                            'insert_colour' => 'бесцветный',
                            'insert_shape' => 'круг',
                            'insert_property' => [
                                'quantity' => 31, 'weight' => 0.419, 'weight_unit' => 'карат',
                                'dimensions' => ['диаметр' => '< 1 мм']
                            ],
                        ],
                        [
                            'stone' => 'бриллиант',
                            'insert_colour' => 'бесцветный',
                            'insert_shape' => 'круг',
                            'insert_property' => [
                                'quantity' => 24, 'weight' => 0.178, 'weight_unit' => 'карат',
                                'dimensions' => ['диаметр' => '< 1 мм']
                            ],
                        ]
                    ]
                ],
            ]
        ];
    }
}
