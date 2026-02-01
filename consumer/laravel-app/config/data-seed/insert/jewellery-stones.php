<?php
declare(strict_types=1);

use JewelleryDomain\Jewellery\InsertItems\OpticalEffect\Enums\OpticalEffectNamesEnum;
use JewelleryDomain\Jewellery\InsertItems\Stone\Enums\StoneNamesEnum;
use JewelleryDomain\Jewellery\InsertItems\StoneFamily\Enums\StoneFamilyNamesEnum;
use JewelleryDomain\Jewellery\InsertItems\StoneGrade\Enums\StoneGradeNamesEnum;
use JewelleryDomain\Jewellery\InsertItems\StoneGroup\Enums\StoneGroupNamesEnum;
use JewelleryDomain\Jewellery\InsertItems\TypeOrigin\Enums\TypeOriginNamesEnum;
use JewelleryDomain\Jewellery\StoneExteriors\Facet\Enums\FacetNamesEnum;
use JewelleryDomain\Jewellery\Stones\StoneColour\Enums\StoneColourNamesEnum;

return [
    [
        'stoneName'        => StoneNamesEnum::AQUAMARINE->value,
        'stoneDescription' => 'Аквамарин - ювелирная разновидность минерала берилла голубого или зеленовато-голубого цвета. Название камня произошло от латинского aqua marina – «морская вода», поскольку цвет камня напоминает теплые тропические моря.',
        'altStoneName'     => 'Санта Мария, берудж, голубой берилл',
        'typeOrigin'       => TypeOriginNamesEnum::NATURE->value,
        'stoneFamily'      => StoneFamilyNamesEnum::BERYL->value,
        'stoneGroup'       => StoneGroupNamesEnum::JEWELLERIES->value,
        'stoneGrade'       => StoneGradeNamesEnum::SECOND_GRADE->value,
        'opticalEffect'    => OpticalEffectNamesEnum::PLEOCHROISM->value,
        'colours'          => [
            [StoneColourNamesEnum::LIGHT_BLUE->value, 50],
            [StoneColourNamesEnum::BLUE->value, 50],
        ],
        'facets'           => [
            [FacetNamesEnum::EMERALD_CUT->value, 20],
            [FacetNamesEnum::ASSCHER_CUT->value, 20],
            [FacetNamesEnum::ROUND_CUT->value, 20],
            [FacetNamesEnum::OVAL_CUT->value, 20],
            [FacetNamesEnum::RADIANT_CUT->value, 20]
        ]
    ],
];
