<?php
declare(strict_types=1);

use JewelleryDomain\Jewelleries\Inserts\Facets\Enums\FacetBuilderEnum;
use JewelleryDomain\Jewelleries\Inserts\OpticalEffects\Enums\OpticalEffectBuilderEnum;
use JewelleryDomain\Jewelleries\Inserts\StoneColours\Enums\StoneColourBuilderEnum;
use JewelleryDomain\Jewelleries\Inserts\StoneFamilies\Enums\StoneFamilyBuilderEnum;
use JewelleryDomain\Jewelleries\Inserts\StoneGrades\Enums\StoneGradeBuilderEnum;
use JewelleryDomain\Jewelleries\Inserts\StoneGroups\Enums\StoneGroupBuilderEnum;

return [
    [
        'stoneName' => '',
        'stoneDescription' => '',
        'altStoneName' => '',
        'stoneFamily' => StoneFamilyBuilderEnum::FELDSPAR->value,
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade' => StoneGradeBuilderEnum::SECOND_GRADE->value,
        'opticalEffect' => OpticalEffectBuilderEnum::PLEOCHROISM->value,
        'colours' => [
            StoneColourBuilderEnum::GREEN->value
        ],
        'facets' => [
            [FacetBuilderEnum::RADIANT_CUT->value, 10],
        ]
    ],
];
