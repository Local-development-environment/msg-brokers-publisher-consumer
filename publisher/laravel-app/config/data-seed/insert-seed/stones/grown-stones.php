<?php
declare(strict_types=1);

use Domain\Inserts\Colours\Enums\ColourBuilderEnum;
use Domain\Inserts\Facets\Enums\FacetBuilderEnum;
use Domain\Inserts\OpticalEffects\Enums\OpticalEffectBuilderEnum;
use Domain\Inserts\StoneFamilies\Enums\StoneFamilyBuilderEnum;

return [
    [
        'stoneName' => 'наношпинель',
        'stoneDescription' => 'Наношпинель выращенная в лаборатории шпинель, обладающая высокой прочностью. Именно эти качества позволяют использовать кристалл для создания самых разнообразных ювелирных украшений.',
        'altStoneName' => 'шпинель синтетическая',
        'stoneFamily' => 'шпинель',
        'stoneGroup' => '',
        'stoneGrade' => '',
        'opticalEffect' => '',
        'colours' => [
            [ColourBuilderEnum::BLUE->value, 100],
            [ColourBuilderEnum::RED->value, 100],
            [ColourBuilderEnum::PURPLE->value, 100],
            [ColourBuilderEnum::ORANGE->value, 100],
            [ColourBuilderEnum::PINK->value, 100],
            [ColourBuilderEnum::BLACK->value, 100],
        ],
        'facets' => [
            [FacetBuilderEnum::EMERALD_CUT->value, 30],
            [FacetBuilderEnum::ROUND_CUT->value, 30],
            [FacetBuilderEnum::CABOCHON_ROUND->value, 5],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 5],
            [FacetBuilderEnum::PRINCESS_CUT->value, 10],
            [FacetBuilderEnum::CUSHION_CUT->value, 10],
            [FacetBuilderEnum::PEAR_CUT->value, 10],
        ]
    ],
    [
        'stoneName' => 'сапфир выращенный',
        'stoneDescription' => 'Современные методы синтеза позволяют выращивать кристаллы со свойствами, идентичными природным. Отличить их от обычных сапфиров под силу только специалисту.',
        'altStoneName' => 'Сапфир гидротермальный',
        'stoneFamily' => '',
        'stoneGroup' => '',
        'stoneGrade' => '',
        'opticalEffect' => '',
        'colours' => [
            [ColourBuilderEnum::BLUE->value, 100],
            [ColourBuilderEnum::GREEN->value, 100],
            [ColourBuilderEnum::PURPLE->value, 100],
            [ColourBuilderEnum::ORANGE->value, 100],
            [ColourBuilderEnum::PINK->value, 100],
            [ColourBuilderEnum::YELLOW->value, 100],
        ],
        'facets' => [
            [FacetBuilderEnum::EMERALD_CUT->value, 30],
            [FacetBuilderEnum::ROUND_CUT->value, 30],
            [FacetBuilderEnum::CABOCHON_ROUND->value, 5],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 5],
            [FacetBuilderEnum::PRINCESS_CUT->value, 10],
            [FacetBuilderEnum::CUSHION_CUT->value, 10],
            [FacetBuilderEnum::PEAR_CUT->value, 10],
        ]
    ],
    [
        'stoneName' => 'сапфир хамелеон выращенный',
        'stoneDescription' => 'это лабораторно выращенный камень, который демонстрирует эффект изменения цвета при разном освещении, например, от синего при дневном свете до пурпурного при искусственном освещении',
        'altStoneName' => 'Сапфир хамелеон гидротермальный',
        'stoneFamily' => StoneFamilyBuilderEnum::CORUNDUM->value,
        'stoneGroup' => '',
        'stoneGrade' => '',
        'opticalEffect' => OpticalEffectBuilderEnum::PLEOCHROISM->value,
        'colours' => [
            ColourBuilderEnum::BLUE->value
        ],
        'facets' => [
            [FacetBuilderEnum::EMERALD_CUT->value, 30],
            [FacetBuilderEnum::ROUND_CUT->value, 30],
            [FacetBuilderEnum::CABOCHON_ROUND->value, 5],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 5],
            [FacetBuilderEnum::PRINCESS_CUT->value, 10],
            [FacetBuilderEnum::CUSHION_CUT->value, 10],
            [FacetBuilderEnum::PEAR_CUT->value, 10],
        ]
    ],
    [
        'stoneName' => 'бриллиант выращенный',
        'stoneDescription' => 'это настоящий алмаз, созданный в лабораторных условиях, а не добытый из земли. Он имеет те же химические, физические и оптические свойства, что и природный камень, включая высокую твердость, поскольку состоит из чистого углерода с такой же кристаллической решеткой.',
        'altStoneName' => 'алмаз выращенный',
        'stoneFamily' => StoneFamilyBuilderEnum::DIAMOND->value,
        'stoneGroup' => '',
        'stoneGrade' => '',
        'opticalEffect' => '',
        'colours' => [
            [ColourBuilderEnum::GREEN->value, 1],
            [ColourBuilderEnum::BROWN->value, 3],
            [ColourBuilderEnum::YELLOW->value, 1],
            [ColourBuilderEnum::COLOURLESS->value, 60],
            [ColourBuilderEnum::LIGHT_BLUE->value, 30],
            [ColourBuilderEnum::BLUE->value, 1],
            [ColourBuilderEnum::PINK->value, 1],
            [ColourBuilderEnum::RED->value, 1],
            [ColourBuilderEnum::BLACK->value, 2]
        ],
        'facets' => [
            [FacetBuilderEnum::RADIANT_CUT->value, 3],
            [FacetBuilderEnum::ASSCHER_CUT->value, 3],
            [FacetBuilderEnum::PEAR_CUT->value, 3],
            [FacetBuilderEnum::EMERALD_CUT->value, 9],
            [FacetBuilderEnum::OVAL_CUT->value, 3],
            [FacetBuilderEnum::ROUND_CUT->value, 70],
            [FacetBuilderEnum::PRINCESS_CUT->value, 3],
            [FacetBuilderEnum::MARQUISE_CUT->value, 3],
            [FacetBuilderEnum::TRILLION_CUT->value, 3],
        ]
    ],
    [
        'stoneName' => 'изумруд выращенный',
        'stoneDescription' => 'Абсолютный аналог природного изумруда. Выращенные в лаборатории изумруды по качеству даже превосходят натуральные: в первых практически отсутствуют дефекты, а спектр возможных оттенков шире.',
        'altStoneName' => 'изумруд гидротермальный',
        'stoneFamily' => StoneFamilyBuilderEnum::BERYL->value,
        'stoneGroup' => '',
        'stoneGrade' => '',
        'opticalEffect' => OpticalEffectBuilderEnum::PLEOCHROISM->value,
        'colours' => [
            [ColourBuilderEnum::GREEN->value, 100]
        ],
        'facets' => [
            [FacetBuilderEnum::EMERALD_CUT->value, 30],
            [FacetBuilderEnum::ROUND_CUT->value, 30],
            [FacetBuilderEnum::CABOCHON_ROUND->value, 5],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 5],
            [FacetBuilderEnum::PRINCESS_CUT->value, 10],
            [FacetBuilderEnum::CUSHION_CUT->value, 10],
            [FacetBuilderEnum::PEAR_CUT->value, 10],
        ]
    ],
];