<?php
declare(strict_types=1);

use Domain\Inserts\Colours\Enums\ColourBuilderEnum;
use Domain\Inserts\Facets\Enums\FacetBuilderEnum;
use Domain\Inserts\StoneFamilies\Enums\StoneFamilyBuilderEnum;
use Domain\Inserts\StoneGroups\Enums\StoneGroupBuilderEnum;
use Domain\Inserts\Stones\Enums\StoneBuilderEnum;

return [
    [
        'stoneName' => StoneBuilderEnum::AGALMATOLITE->value,
        'stoneDescription' => 'Агальматолит — это минерал, который относится к группе слоистых силикатов. Он известен своими нежными пастельными оттенками и гладкой шелковистой текстурой. Агальматолит часто используется в качестве материала для резьбы и изготовления скульптур, а также в ювелирных изделиях. Минерал был известен в Китае с древних времен, где его ценили за красоту и считали символом благополучия и долголетия.',
        'altStoneName' => 'Пирофиллит, фудзянский жад, ледяной камень',
        'stoneFamily' => StoneFamilyBuilderEnum::SILICATE->value,
        'stoneGroup' => StoneGroupBuilderEnum::ORNAMENTAL->value,
        'stoneGrade' => '',
        'opticalEffect' => '',
        'colours' => [
            [ColourBuilderEnum::GRAY->value, 10],
            [ColourBuilderEnum::RED->value, 15],
            [ColourBuilderEnum::PINK->value, 15],
            [ColourBuilderEnum::GREEN->value, 15],
            [ColourBuilderEnum::YELLOW->value, 15],
            [ColourBuilderEnum::LILAC->value, 15],
            [ColourBuilderEnum::WHITE->value, 15]
        ],
        'facets' => [
            [FacetBuilderEnum::CABOCHON_ROUND->value, 50],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 50],
        ]
    ],
    [
        'stoneName' => StoneBuilderEnum::JET->value,
        'stoneDescription' => 'Обычно имеет насыщенный черный цвет и матовый или жирный блеск. Излом раковистый, как у смолы.',
        'altStoneName' => 'черный янтарь, черная яшма, гешер',
        'stoneFamily' => StoneFamilyBuilderEnum::COAL->value,
        'stoneGroup' => StoneGroupBuilderEnum::ORNAMENTAL->value,
        'stoneGrade' => '',
        'opticalEffect' => '',
        'colours' => [
            [ColourBuilderEnum::BLACK->value, 100]
        ],
        'facets' => [
            [FacetBuilderEnum::CABOCHON_ROUND->value, 50],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 50],
        ]
    ],
];