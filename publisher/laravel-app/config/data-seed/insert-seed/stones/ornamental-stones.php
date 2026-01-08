<?php
declare(strict_types=1);

use Domain\Inserts\Facets\Enums\FacetBuilderEnum;
use Domain\Inserts\StoneColours\Enums\StoneColourBuilderEnum;
use Domain\Inserts\StoneFamilies\Enums\StoneFamilyBuilderEnum;
use Domain\Inserts\StoneGroups\Enums\StoneGroupBuilderEnum;
use Domain\Inserts\Stones\Enums\StoneBuilderEnum;
use Domain\Inserts\TypeOrigins\Enums\TypeOriginBuilderEnum;

return [
    [
        'stoneName' => StoneBuilderEnum::AGALMATOLITE->value,
        'stoneDescription' => 'Агальматолит — это минерал, который относится к группе слоистых силикатов. Он известен своими нежными пастельными оттенками и гладкой шелковистой текстурой. Агальматолит часто используется в качестве материала для резьбы и изготовления скульптур, а также в ювелирных изделиях. Минерал был известен в Китае с древних времен, где его ценили за красоту и считали символом благополучия и долголетия.',
        'altStoneName' => 'Пирофиллит, фудзянский жад, ледяной камень',
        'typeOrigin' => TypeOriginBuilderEnum::NATURE->value,
        'stoneFamily' => StoneFamilyBuilderEnum::SILICATE->value,
        'stoneGroup' => StoneGroupBuilderEnum::ORNAMENTAL->value,
        'stoneGrade' => '',
        'opticalEffect' => '',
        'colours' => [
            [StoneColourBuilderEnum::GRAY->value, 10],
            [StoneColourBuilderEnum::RED->value, 15],
            [StoneColourBuilderEnum::PINK->value, 15],
            [StoneColourBuilderEnum::GREEN->value, 15],
            [StoneColourBuilderEnum::YELLOW->value, 15],
            [StoneColourBuilderEnum::LILAC->value, 15],
            [StoneColourBuilderEnum::WHITE->value, 15]
        ],
        'facets' => [
            [FacetBuilderEnum::CABOCHON_ROUND->value, 50],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 50],
        ]
    ],
    [
        'stoneName' => StoneBuilderEnum::JET->value,
        'stoneDescription' => 'Гагат обычно имеет насыщенный черный цвет и матовый или жирный блеск. Излом раковистый, как у смолы.',
        'altStoneName' => 'черный янтарь, черная яшма, гешер',
        'typeOrigin' => TypeOriginBuilderEnum::NATURE->value,
        'stoneFamily' => StoneFamilyBuilderEnum::COAL->value,
        'stoneGroup' => StoneGroupBuilderEnum::ORNAMENTAL->value,
        'stoneGrade' => '',
        'opticalEffect' => '',
        'colours' => [
            [StoneColourBuilderEnum::BLACK->value, 100]
        ],
        'facets' => [
            [FacetBuilderEnum::CABOCHON_ROUND->value, 50],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 50],
        ]
    ],
];
