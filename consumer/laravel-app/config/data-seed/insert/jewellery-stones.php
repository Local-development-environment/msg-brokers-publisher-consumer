<?php
declare(strict_types=1);

use JewelleryDomain\Jewellery\StoneExteriors\StoneCutForm\Enums\StoneCutFormNamesEnum;
use JewelleryDomain\Jewellery\Stones\OpticalEffect\Enums\OpticalEffectNamesEnum;
use JewelleryDomain\Jewellery\Stones\Stone\Enums\StoneNamesEnum;
use JewelleryDomain\Jewellery\Stones\StoneColour\Enums\StoneColourNamesEnum;
use JewelleryDomain\Jewellery\Stones\StoneGroup\Enums\StoneGroupNamesEnum;
use JewelleryDomain\Jewellery\Stones\TypeOrigin\Enums\TypeOriginNamesEnum;

return [
    [
        'stoneName'        => StoneNamesEnum::AQUAMARINE->value,
        'stoneDescription' => 'Аквамарин - ювелирная разновидность минерала берилла голубого или зеленовато-голубого цвета. Название камня произошло от латинского aqua marina – «морская вода», поскольку цвет камня напоминает теплые тропические моря.',
        'altStoneName'     => 'Санта Мария, берудж, голубой берилл',
        'typeOrigin'       => TypeOriginNamesEnum::NATURE->value,
//        'stoneFamily'      => StoneFamilyNamesEnum::BERYL->value,
        'stoneGroup'       => StoneGroupNamesEnum::JEWELLERIES->value,
//        'stoneGrade'       => StoneGradeNamesEnum::SECOND_GRADE->value,
        'opticalEffect'    => OpticalEffectNamesEnum::PLEOCHROISM->value,
        'colours'          => [
            [StoneColourNamesEnum::LIGHT_BLUE->value, 50],
            [StoneColourNamesEnum::BLUE->value, 50],
        ],
        'facets'           => [
            [StoneCutFormNamesEnum::EMERALD_CUT->value, 20],
            [StoneCutFormNamesEnum::ASSCHER_CUT->value, 20],
            [StoneCutFormNamesEnum::ROUND_CUT->value, 20],
            [StoneCutFormNamesEnum::OVAL_CUT->value, 20],
            [StoneCutFormNamesEnum::RADIANT_CUT->value, 20]
        ]
    ],
];
