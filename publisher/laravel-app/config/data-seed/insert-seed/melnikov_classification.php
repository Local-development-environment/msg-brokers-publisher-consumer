<?php
declare(strict_types=1);

use Domain\Inserts\Colours\Enums\ColourBuilderEnum;
use Domain\Inserts\Facets\Enums\FacetBuilderEnum;
use Domain\Inserts\OpticalEffects\Enums\OpticalEffectBuilderEnum;
use Domain\Inserts\StoneGrades\Enums\StoneGradeBuilderEnum;
use Domain\Inserts\StoneGroups\Enums\StoneGroupBuilderEnum;
use Domain\Inserts\StoneFamilies\Enums\StoneFamilyBuilderEnum;

return [

    /******************** ДРАГОЦЕННЫЕ КАМНИ *************************/

    [
        'stoneName' => 'александрит',
        'stoneDescription' => 'Александрит — это редкий минерал, разновидность хризоберилла, известный своей способностью менять цвет в зависимости от освещения. При дневном свете он выглядит зелёным, а при искусственном — приобретает красноватый или фиолетовый оттенок.',
        'altStoneName' => 'хризоберилл, вдовий камень',
        'usingJewellery' => 1,
        'stoneFamily' => StoneFamilyBuilderEnum::CHRYSOBERYL->value,
        'stoneGroup' => StoneGroupBuilderEnum::PRECIOUS->value,
        'stoneGrade' => '',
        'opticalEffect' => OpticalEffectBuilderEnum::PLEOCHROISM->value,
        'colours' => [
            ColourBuilderEnum::GREEN->value
        ],
        'facets' => [
            [FacetBuilderEnum::RADIANT_CUT->value, 10],
            [FacetBuilderEnum::ASSCHER_CUT->value, 10],
            [FacetBuilderEnum::PEAR_CUT->value, 10],
            [FacetBuilderEnum::EMERALD_CUT->value, 10],
            [FacetBuilderEnum::OVAL_CUT->value, 10],
            [FacetBuilderEnum::ROUND_CUT->value, 10],
            [FacetBuilderEnum::PRINCESS_CUT->value, 10],
            [FacetBuilderEnum::MARQUISE_CUT->value, 10],
            [FacetBuilderEnum::TRILLION_CUT->value, 10],
            [FacetBuilderEnum::HEART_CUT, 10],
        ]
    ],
    [
        'stoneName' => 'бриллиант',
        'stoneDescription' => 'Бриллиант — это ограненный алмаз, который благодаря специальной огранке максимально проявляет свой блеск. Само название происходит от французского слова «brillant» и означает «сверкающий, блестящий».',
        'altStoneName' => 'диамант, адамант',
        'usingJewellery' => 1,
        'stoneFamily' => StoneFamilyBuilderEnum::DIAMOND->value,
        'stoneGroup' => StoneGroupBuilderEnum::PRECIOUS->value,
        'stoneGrade' => '',
        'opticalEffect' => '',
        'colours' => [
            ColourBuilderEnum::GREEN->value,
            ColourBuilderEnum::BROWN->value,
            ColourBuilderEnum::YELLOW->value,
            ColourBuilderEnum::COLOURLESS->value,
            ColourBuilderEnum::LIGHT_BLUE->value,
            ColourBuilderEnum::BLUE->value,
            ColourBuilderEnum::PINK->value,
            ColourBuilderEnum::RED->value,
            ColourBuilderEnum::BLACK->value
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

    /******************** ЮВЕЛИРНЫЕ КАМНИ *************************/

    [
        'stoneName' => 'аквамарин',
        'stoneDescription' => 'Аквамарин - ювелирная разновидность минерала берилла голубого или зеленовато-голубого цвета. Название камня произошло от латинского aqua marina – «морская вода», поскольку цвет камня напоминает теплые тропические моря.',
        'altStoneName' => 'Санта Мария, берудж, голубой берилл',
        'usingJewellery' => 1,
        'stoneFamily' => StoneFamilyBuilderEnum::BERYL->value,
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade' => StoneGradeBuilderEnum::SECOND_GRADE->value,
        'opticalEffect' => OpticalEffectBuilderEnum::PLEOCHROISM->value,
        'colours' => [
            ColourBuilderEnum::LIGHT_BLUE->value,
            ColourBuilderEnum::BLUE->value,
        ],
        'facets' => [
            [FacetBuilderEnum::EMERALD_CUT->value, 20],
            [FacetBuilderEnum::ASSCHER_CUT->value, 20],
            [FacetBuilderEnum::ROUND_CUT->value, 20],
            [FacetBuilderEnum::OVAL_CUT->value, 20],
            [FacetBuilderEnum::RADIANT_CUT->value, 20]
        ]
    ],
    [
        'stoneName' => 'аквамарин кошачий глаз',
        'stoneDescription' => 'Аквамарин «кошачий глаз» — это редкая разновидность берилла с эффектом «кошачьего глаза», а аквамарин — это камень без этого эффекта. Главное отличие в том, что «кошачий глаз» имеет переливчатость и обычно обрабатывается в виде кабошона, а стандартный аквамарин чаще фасетной огранки. ',
        'altStoneName' => 'берилл с эффектом кошачьего глаза',
        'usingJewellery' => 1,
        'stoneFamily' => StoneFamilyBuilderEnum::BERYL->value,
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade' => StoneGradeBuilderEnum::SECOND_GRADE->value,
        'opticalEffect' => OpticalEffectBuilderEnum::CATS_YEY->value,
        'colours' => [
            ColourBuilderEnum::LIGHT_BLUE->value,
            ColourBuilderEnum::BLUE->value,
        ],
        'facets' => [
            [FacetBuilderEnum::CABOCHON_ROUND->value, 30],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 30]
        ]
    ],
    [
        'stoneName' => 'аксинит',
        'stoneDescription' => 'Один из немногих камней, которые могут производить в себе различные цвета в зависимости от падающего на них света. Если смотреть на него под разными углами, то они будут выдавать в своём теле различные оттенки, ранее в них не замеченные.',
        'altStoneName' => 'севергинит, тумит',
        'usingJewellery' => 0,
        'stoneFamily' => StoneFamilyBuilderEnum::SILICATE->value,
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade' => StoneGradeBuilderEnum::FORTH_GRADE->value,
        'opticalEffect' => OpticalEffectBuilderEnum::PLEOCHROISM->value,
        'colours' => [
            ColourBuilderEnum::BROWN->value,
            ColourBuilderEnum::BLUE->value,
            ColourBuilderEnum::YELLOW->value,
            ColourBuilderEnum::PURPLE->value
        ],
        'facets' => [
            [FacetBuilderEnum::CABOCHON_ROUND->value, 30],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 30],
            [FacetBuilderEnum::ROUND_CUT->value, 20],
            [FacetBuilderEnum::OVAL_CUT->value, 20]
        ]
    ],
    [
        'stoneName' => 'гранат альмандин',
        'stoneDescription' => 'Альмандин — это разновидность граната, силикат железа и алюминия, известный своей высокой твердостью и широким спектром красных, красно-фиолетовых и красно-бурых оттенков. Один из самых распространенных видов граната, используемый в ювелирном деле для изготовления украшений',
        'altStoneName' => 'карбункул, алабандская венисса',
        'usingJewellery' => 1,
        'stoneFamily' => StoneFamilyBuilderEnum::SILICATE->value,
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade' => StoneGradeBuilderEnum::THIRD_GRADE->value,
        'opticalEffect' => '',
        'colours' => [
            ColourBuilderEnum::RED->value
        ],
        'facets' => [
            [FacetBuilderEnum::ROUND_CUT->value, 35],
            [FacetBuilderEnum::OVAL_CUT->value, 35],
            [FacetBuilderEnum::TRILLION_CUT->value, 10],
            [FacetBuilderEnum::MARQUISE_CUT->value, 10],
            [FacetBuilderEnum::EMERALD_CUT->value, 10],
        ]
    ],
    [
        'stoneName' => 'аметист',
        'stoneDescription' => 'Аметист — это ювелирный фиолетовый камень, разновидность кварца, популярный в ювелирном деле. Он ценится за свой насыщенный цвет, который варьируется от нежного лилового до тёмно-пурпурного.',
        'altStoneName' => 'аметистовый кварц, камень Бахуса',
        'usingJewellery' => 1,
        'stoneFamily' => StoneFamilyBuilderEnum::QUARTZ->value,
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade' => StoneGradeBuilderEnum::THIRD_GRADE->value,
        'opticalEffect' => '',
        'colours' => [
            ColourBuilderEnum::PURPLE->value,
            ColourBuilderEnum::LILAC->value
        ],
        'facets' => [
            [FacetBuilderEnum::CABOCHON_ROUND->value, 20],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 20],
            [FacetBuilderEnum::ROUND_CUT->value, 20],
            [FacetBuilderEnum::OVAL_CUT->value, 20],
            [FacetBuilderEnum::TRILLION_CUT->value, 10],
            [FacetBuilderEnum::PEAR_CUT->value, 10],
        ]
    ],

    /******************** ЮВЕЛИРНО-ПОДЕЛОЧНЫЕ КАМНИ *************************/
    [
        'stoneName' => 'авантюрин',
        'stoneDescription' => 'Авантюрин – одна из разновидностей кварца. Его название происходит от итальянского avventura и переводится как «случайность» или «приключение».',
        'altStoneName' => 'Зеленый авантюрин называют Индийским Жадом или Императорским камнем',
        'usingJewellery' => 1,
        'stoneFamily' => StoneFamilyBuilderEnum::QUARTZ->value,
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERY_ORNAMENTAL->value,
        'stoneGrade' => StoneGradeBuilderEnum::SECOND_GRADE->value,
        'opticalEffect' => '',
        'colours' => [
            ColourBuilderEnum::GREEN->value,
            ColourBuilderEnum::BROWN->value,
            ColourBuilderEnum::YELLOW->value,
            ColourBuilderEnum::BLACK->value,
            ColourBuilderEnum::WHITE->value,
            ColourBuilderEnum::BLUE->value,
            ColourBuilderEnum::PINK->value
        ],
        'facets' => [
            [FacetBuilderEnum::CABOCHON_ROUND->value, 50],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 50]
        ]
    ],
    [
        'stoneName' => 'агат',
        'stoneDescription' => 'Агат известен благодаря своему разнообразию цветов и рисунков, которые формируются в результате слоев, и ценится как в ювелирном деле, так и в декоративных целях. ',
        'altStoneName' => 'Много названий в зависимости от цвета',
        'usingJewellery' => 1,
        'stoneFamily' => StoneFamilyBuilderEnum::QUARTZ->value,
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERY_ORNAMENTAL->value,
        'stoneGrade' => StoneGradeBuilderEnum::FIRST_GRADE->value,
        'opticalEffect' => '',
        'colours' => [
            ColourBuilderEnum::GREEN->value,
            ColourBuilderEnum::BROWN->value,
            ColourBuilderEnum::YELLOW->value,
            ColourBuilderEnum::MULTI_COLOUR->value,
            ColourBuilderEnum::GRAY->value,
            ColourBuilderEnum::BLUE->value,
            ColourBuilderEnum::PURPLE->value,
            ColourBuilderEnum::RED->value,
            ColourBuilderEnum::BLACK->value,
            ColourBuilderEnum::WHITE->value
        ],
        'facets' => [
            [FacetBuilderEnum::CABOCHON_ROUND->value, 50],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 50]
        ]
    ],
    [
        'stoneName' => 'лунный камень',
        'stoneDescription' => 'Это минерал из группы калиевых полевых шпатов, обладает характерным голубовато-серебристым мерцанием (иризацией), которое возникает из-за преломления света в слоистой структуре. ',
        'altStoneName' => 'Адуляр',
        'usingJewellery' => 1,
        'stoneFamily' => StoneFamilyBuilderEnum::FELDSPAR->value,
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERY_ORNAMENTAL->value,
        'stoneGrade' => StoneGradeBuilderEnum::SECOND_GRADE->value,
        'opticalEffect' => OpticalEffectBuilderEnum::ADULARESCENCE,
        'colours' => [
            ColourBuilderEnum::MULTI_COLOUR->value,
            ColourBuilderEnum::GRAY->value,
            ColourBuilderEnum::BROWN->value,
            ColourBuilderEnum::GREEN->value,
            ColourBuilderEnum::ORANGE->value,
            ColourBuilderEnum::BLACK->value,
            ColourBuilderEnum::WHITE->value
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
        'stoneName' => 'азурит',
        'stoneDescription' => 'Обладает довольно редким и особым синим цветом, камень был прозван по-персидски - «синева». Идеально подходит форма кабошона, из-за мягкости огранка не применяется',
        'altStoneName' => 'медная лазурь, шессилит',
        'usingJewellery' => 1,
        'stoneFamily' => StoneFamilyBuilderEnum::CARBONATE->value,
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERY_ORNAMENTAL->value,
        'stoneGrade' => StoneGradeBuilderEnum::FIRST_GRADE->value,
        'opticalEffect' => '',
        'colours' => [
            ColourBuilderEnum::LIGHT_BLUE->value,
            ColourBuilderEnum::BLUE->value,
        ],
        'facets' => [
            [FacetBuilderEnum::CABOCHON_ROUND->value, 45],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 45],
        ]
    ],
    [
        'stoneName' => 'актинолит',
        'stoneDescription' => 'Ювелирные разновидности богатого хромом актинолита в огранке смотрятся почти как изумруд высоких цветов',
        'altStoneName' => 'лучистый камень',
        'usingJewellery' => 1,
        'stoneFamily' => StoneFamilyBuilderEnum::SILICATE->value,
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERY_ORNAMENTAL->value,
        'stoneGrade' => StoneGradeBuilderEnum::SECOND_GRADE->value,
        'opticalEffect' => OpticalEffectBuilderEnum::CATS_YEY->value,
        'colours' => [
            ColourBuilderEnum::BLACK->value,
            ColourBuilderEnum::WHITE->value,
            ColourBuilderEnum::GRAY->value,
            ColourBuilderEnum::BROWN->value,
            ColourBuilderEnum::GREEN->value,
            ColourBuilderEnum::YELLOW->value
        ],
        'facets' => [
            [FacetBuilderEnum::CABOCHON_ROUND->value, 45],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 45],
        ]
    ],
    [
        'stoneName' => 'амазонит',
        'stoneDescription' => 'Камень амазонит имеет приятный сине-зеленый светлый оттенок. Окрас равномерный, однородный. Он является разновидностью микролина, обладает стеклянным блеском.',
        'altStoneName' => 'амазонский камень, амазонский жад',
        'stoneFamily' => StoneFamilyBuilderEnum::FELDSPAR->value,
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERY_ORNAMENTAL->value,
        'stoneGrade' => StoneGradeBuilderEnum::SECOND_GRADE->value,
        'opticalEffect' => '',
        'colours' => [
            ColourBuilderEnum::GREEN->value
        ],
        'facets' => [
            [FacetBuilderEnum::CABOCHON_ROUND->value, 50],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 50]
        ]
    ],

    /******************** ПОДЕЛОЧНЫЕ КАМНИ *************************/
    [
        'stoneName' => 'агальматалит',
        'stoneDescription' => 'Агальматолит — это минерал, который относится к группе слоистых силикатов. Он известен своими нежными пастельными оттенками и гладкой шелковистой текстурой. Агальматолит часто используется в качестве материала для резьбы и изготовления скульптур, а также в ювелирных изделиях. Минерал был известен в Китае с древних времен, где его ценили за красоту и считали символом благополучия и долголетия.',
        'altStoneName' => 'Пирофиллит, фудзянский жад, ледяной камень',
        'stoneFamily' => StoneFamilyBuilderEnum::SILICATE->value,
        'stoneGroup' => StoneGroupBuilderEnum::ORNAMENTAL->value,
        'stoneGrade' => '',
        'opticalEffect' => '',
        'colours' => [
            ColourBuilderEnum::GRAY->value,
            ColourBuilderEnum::RED->value,
            ColourBuilderEnum::PINK->value,
            ColourBuilderEnum::GREEN->value,
            ColourBuilderEnum::YELLOW->value,
            ColourBuilderEnum::LILAC->value,
            ColourBuilderEnum::WHITE->value
        ],
        'facets' => [
            [FacetBuilderEnum::CABOCHON_ROUND->value, 50],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 50],
        ]
    ],

];