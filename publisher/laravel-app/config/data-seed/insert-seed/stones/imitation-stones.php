<?php
declare(strict_types=1);

use Domain\Inserts\Colours\Enums\StoneColourBuilderEnum;
use Domain\Inserts\Facets\Enums\FacetBuilderEnum;
use Domain\Inserts\OpticalEffects\Enums\OpticalEffectBuilderEnum;
use Domain\Inserts\Stones\Enums\StoneBuilderEnum;
use Domain\Inserts\TypeOrigins\Enums\TypeOriginBuilderEnum;

return [
    [
        'stoneName' => StoneBuilderEnum::CUBIC_ZIRCONIA->value,
        'stoneDescription' => 'Фианит - это искусственно синтезированный кристалл, диоксид циркония, который часто используется в ювелирном деле для имитации бриллиантов.',
        'altStoneName' => 'бриллиант имитация',
        'typeOrigin' => TypeOriginBuilderEnum::IMITATION->value,
        'stoneFamily' => '',
        'stoneGroup' => '',
        'stoneGrade' => '',
        'opticalEffect' => '',
        'colours' => [
            [StoneColourBuilderEnum::GREEN->value, 1],
            [StoneColourBuilderEnum::BROWN->value, 3],
            [StoneColourBuilderEnum::YELLOW->value, 1],
            [StoneColourBuilderEnum::COLOURLESS->value, 60],
            [StoneColourBuilderEnum::LIGHT_BLUE->value, 30],
            [StoneColourBuilderEnum::BLUE->value, 1],
            [StoneColourBuilderEnum::PINK->value, 1],
            [StoneColourBuilderEnum::RED->value, 1],
            [StoneColourBuilderEnum::BLACK->value, 2]
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
        'stoneName' => StoneBuilderEnum::MOISSANITE->value,
        'stoneDescription' => 'Синтетический муассанит (карборунд) — имитация алмаза. Помимо высокой твердости, сопоставимой с аналогичным показателем алмаза, сильного блеска и игры, он обладает высокой теплопроводностью.',
        'altStoneName' => 'бриллиант имитация',
        'typeOrigin' => TypeOriginBuilderEnum::IMITATION->value,
        'stoneFamily' => '',
        'stoneGroup' => '',
        'stoneGrade' => '',
        'opticalEffect' => '',
        'colours' => [
            [StoneColourBuilderEnum::GREEN->value, 1],
            [StoneColourBuilderEnum::BROWN->value, 3],
            [StoneColourBuilderEnum::YELLOW->value, 1],
            [StoneColourBuilderEnum::COLOURLESS->value, 60],
            [StoneColourBuilderEnum::LIGHT_BLUE->value, 30],
            [StoneColourBuilderEnum::BLUE->value, 1],
            [StoneColourBuilderEnum::PINK->value, 1],
            [StoneColourBuilderEnum::RED->value, 1],
            [StoneColourBuilderEnum::BLACK->value, 2]
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
        'stoneName' => StoneBuilderEnum::OPAL_IMITATION->value,
        'stoneDescription' => 'Имитация опала — это искусственно созданный материал, который внешне похож на натуральный опал, но не обладает его уникальной структурой и свойствами. Это может быть опалит (специальное стекло), синтетический камень или другой материал, изготовленный для имитации игры цветов и внешнего вида природного камня.',
        'altStoneName' => 'опалит',
        'typeOrigin' => TypeOriginBuilderEnum::IMITATION->value,
        'stoneFamily' => '',
        'stoneGroup' => '',
        'stoneGrade' => '',
        'opticalEffect' => OpticalEffectBuilderEnum::OPALESCENCE->value,
        'colours' => [
            [StoneColourBuilderEnum::PURPLE->value, 25],
            [StoneColourBuilderEnum::YELLOW->value, 25],
            [StoneColourBuilderEnum::BLUE->value, 25],
            [StoneColourBuilderEnum::PINK->value, 25]
        ],
        'facets' => [
            [FacetBuilderEnum::CABOCHON_OVAL->value, 50],
            [FacetBuilderEnum::CABOCHON_ROUND->value, 50],
        ]
    ],
    [
        'stoneName' => StoneBuilderEnum::ALPANITE->value,
        'stoneDescription' => 'алпанит, или альпинит, — это не камень, а полученный в лабораторных условиях кристалл, сродни фианиту.',
        'altStoneName' => 'альпинит, swarovski',
        'typeOrigin' => TypeOriginBuilderEnum::IMITATION->value,
        'stoneFamily' => '',
        'stoneGroup' => '',
        'stoneGrade' => '',
        'opticalEffect' => '',
        'colours' => [
            [StoneColourBuilderEnum::PURPLE->value, 20],
            [StoneColourBuilderEnum::YELLOW->value, 20],
            [StoneColourBuilderEnum::BLUE->value, 20],
            [StoneColourBuilderEnum::GREEN->value, 20],
            [StoneColourBuilderEnum::RED->value, 15],
            [StoneColourBuilderEnum::BROWN->value, 5],
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
];
