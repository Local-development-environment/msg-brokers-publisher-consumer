<?php
declare(strict_types=1);

use Domain\Inserts\Facets\Enums\FacetBuilderEnum;
use Domain\Inserts\OpticalEffects\Enums\OpticalEffectBuilderEnum;
use Domain\Inserts\StoneColours\Enums\StoneColourBuilderEnum;
use Domain\Inserts\StoneFamilies\Enums\StoneFamilyBuilderEnum;
use Domain\Inserts\StoneGrades\Enums\StoneGradeBuilderEnum;
use Domain\Inserts\StoneGroups\Enums\StoneGroupBuilderEnum;
use Domain\Inserts\Stones\Enums\StoneBuilderEnum;
use Domain\Inserts\TypeOrigins\Enums\TypeOriginBuilderEnum;

return [
    [
        'stoneName' => StoneBuilderEnum::AVENTURINE->value,
        'stoneDescription' => 'Авантюрин – одна из разновидностей кварца. Его название происходит от итальянского avventura и переводится как «случайность» или «приключение».',
        'altStoneName' => 'Зеленый авантюрин называют Индийским Жадом или Императорским камнем',
        'typeOrigin' => TypeOriginBuilderEnum::NATURE->value,
        'stoneFamily' => StoneFamilyBuilderEnum::QUARTZ->value,
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERY_ORNAMENTAL->value,
        'stoneGrade' => StoneGradeBuilderEnum::SECOND_GRADE->value,
        'opticalEffect' => '',
        'colours' => [
            [StoneColourBuilderEnum::GREEN->value, 15],
            [StoneColourBuilderEnum::BROWN->value, 15],
            [StoneColourBuilderEnum::YELLOW->value, 15],
            [StoneColourBuilderEnum::BLACK->value, 10],
            [StoneColourBuilderEnum::WHITE->value, 15],
            [StoneColourBuilderEnum::BLUE->value, 15],
            [StoneColourBuilderEnum::PINK->value, 15]
        ],
        'facets' => [
            [FacetBuilderEnum::CABOCHON_ROUND->value, 50],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 50]
        ]
    ],
    [
        'stoneName' => StoneBuilderEnum::AGATE->value,
        'stoneDescription' => 'Агат известен благодаря своему разнообразию цветов и рисунков, которые формируются в результате слоев, и ценится как в ювелирном деле, так и в декоративных целях. ',
        'altStoneName' => 'Много названий в зависимости от цвета',
        'typeOrigin' => TypeOriginBuilderEnum::NATURE->value,
        'stoneFamily' => StoneFamilyBuilderEnum::QUARTZ->value,
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERY_ORNAMENTAL->value,
        'stoneGrade' => StoneGradeBuilderEnum::FIRST_GRADE->value,
        'opticalEffect' => '',
        'colours' => [
            [StoneColourBuilderEnum::GREEN->value, 10],
            [StoneColourBuilderEnum::BROWN->value, 10],
            [StoneColourBuilderEnum::YELLOW->value, 10],
            [StoneColourBuilderEnum::MULTI_COLOUR->value, 10],
            [StoneColourBuilderEnum::GRAY->value, 10],
            [StoneColourBuilderEnum::BLUE->value, 10],
            [StoneColourBuilderEnum::PURPLE->value, 10],
            [StoneColourBuilderEnum::RED->value, 10],
            [StoneColourBuilderEnum::BLACK->value, 10],
            [StoneColourBuilderEnum::WHITE->value, 10]
        ],
        'facets' => [
            [FacetBuilderEnum::CABOCHON_ROUND->value, 50],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 50]
        ]
    ],
    [
        'stoneName' => StoneBuilderEnum::MOONSTONE->value,
        'stoneDescription' => 'Это минерал из группы калиевых полевых шпатов, обладает характерным голубовато-серебристым мерцанием (иризацией), которое возникает из-за преломления света в слоистой структуре. ',
        'altStoneName' => 'Адуляр',
        'typeOrigin' => TypeOriginBuilderEnum::NATURE->value,
        'stoneFamily' => StoneFamilyBuilderEnum::FELDSPAR->value,
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERY_ORNAMENTAL->value,
        'stoneGrade' => StoneGradeBuilderEnum::SECOND_GRADE->value,
        'opticalEffect' => OpticalEffectBuilderEnum::ADULARESCENCE->value,
        'colours' => [
            [StoneColourBuilderEnum::MULTI_COLOUR->value, 15],
            [StoneColourBuilderEnum::GRAY->value, 10],
            [StoneColourBuilderEnum::BROWN->value, 15],
            [StoneColourBuilderEnum::GREEN->value, 15],
            [StoneColourBuilderEnum::ORANGE->value, 15],
            [StoneColourBuilderEnum::BLACK->value, 15],
            [StoneColourBuilderEnum::WHITE->value, 15]
        ],
        'facets' => [
            [FacetBuilderEnum::CABOCHON_ROUND->value, 30],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 30],
            [FacetBuilderEnum::PEAR_CUT->value, 10],
            [FacetBuilderEnum::OVAL_CUT->value, 15],
            [FacetBuilderEnum::ROUND_CUT->value, 15]
        ]
    ],
    [
        'stoneName' => StoneBuilderEnum::AZURITE->value,
        'stoneDescription' => 'Обладает довольно редким и особым синим цветом, камень был прозван по-персидски - «синева». Идеально подходит форма кабошона, из-за мягкости огранка не применяется',
        'altStoneName' => 'медная лазурь, шессилит',
        'typeOrigin' => TypeOriginBuilderEnum::NATURE->value,
        'stoneFamily' => StoneFamilyBuilderEnum::CARBONATE->value,
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERY_ORNAMENTAL->value,
        'stoneGrade' => StoneGradeBuilderEnum::FIRST_GRADE->value,
        'opticalEffect' => '',
        'colours' => [
            [StoneColourBuilderEnum::LIGHT_BLUE->value, 50],
            [StoneColourBuilderEnum::BLUE->value, 50],
        ],
        'facets' => [
            [FacetBuilderEnum::CABOCHON_ROUND->value, 50],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 50],
        ]
    ],
    [
        'stoneName' => StoneBuilderEnum::ACTINOLITE->value,
        'stoneDescription' => 'Ювелирные разновидности богатого хромом актинолита в огранке смотрятся почти как изумруд высоких цветов',
        'altStoneName' => 'лучистый камень',
        'typeOrigin' => TypeOriginBuilderEnum::NATURE->value,
        'stoneFamily' => StoneFamilyBuilderEnum::SILICATE->value,
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERY_ORNAMENTAL->value,
        'stoneGrade' => StoneGradeBuilderEnum::SECOND_GRADE->value,
        'opticalEffect' => OpticalEffectBuilderEnum::CATS_YEY->value,
        'colours' => [
            [StoneColourBuilderEnum::BLACK->value, 15],
            [StoneColourBuilderEnum::WHITE->value, 20],
            [StoneColourBuilderEnum::GRAY->value, 15],
            [StoneColourBuilderEnum::BROWN->value, 15],
            [StoneColourBuilderEnum::GREEN->value, 20],
            [StoneColourBuilderEnum::YELLOW->value, 15]
        ],
        'facets' => [
            [FacetBuilderEnum::CABOCHON_ROUND->value, 45],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 45],
        ]
    ],
    [
        'stoneName' => StoneBuilderEnum::AMAZONITE->value,
        'stoneDescription' => 'Камень амазонит имеет приятный сине-зеленый светлый оттенок. Окрас равномерный, однородный. Он является разновидностью микролина, обладает стеклянным блеском.',
        'altStoneName' => 'амазонский камень, амазонский жад',
        'typeOrigin' => TypeOriginBuilderEnum::NATURE->value,
        'stoneFamily' => StoneFamilyBuilderEnum::FELDSPAR->value,
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERY_ORNAMENTAL->value,
        'stoneGrade' => StoneGradeBuilderEnum::SECOND_GRADE->value,
        'opticalEffect' => '',
        'colours' => [
            [StoneColourBuilderEnum::GREEN->value, 100]
        ],
        'facets' => [
            [FacetBuilderEnum::CABOCHON_ROUND->value, 50],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 50]
        ]
    ],
];
