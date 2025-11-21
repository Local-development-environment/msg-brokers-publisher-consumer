<?php
declare(strict_types=1);

use Domain\Inserts\Colours\Enums\ColourBuilderEnum;
use Domain\Inserts\Facets\Enums\FacetBuilderEnum;
use Domain\Inserts\StoneGrades\Enums\StoneGradeBuilderEnum;
use Domain\Inserts\StoneGroups\Enums\StoneGroupBuilderEnum;

return [

    /******************** ДРАГОЦЕННЫЕ КАМНИ *************************/

    [
        'stoneName' => 'александрит',
        'stoneDescription' => 'Александрит — это редкий минерал, разновидность хризоберилла, известный своей способностью менять цвет в зависимости от освещения. При дневном свете он выглядит зелёным, а при искусственном — приобретает красноватый или фиолетовый оттенок.',
        'altStoneName' => 'хризоберилл, вдовий камень',
        'stoneFamily' => 'хризоберилл',
        'stoneGroup' => StoneGroupBuilderEnum::PRECIOUS->value,
        'stoneGrade' => null,
        'opticalEffect' => 'плеохроизм',
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
        'stoneFamily' => 'алмаз',
        'stoneGroup' => StoneGroupBuilderEnum::PRECIOUS->value,
        'stoneGrade' => null,
        'opticalEffect' => null,
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
            [FacetBuilderEnum::EMERALD_CUT->value, 3],
            [FacetBuilderEnum::OVAL_CUT->value, 3],
            [FacetBuilderEnum::ROUND_CUT->value, 76],
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
        'stoneFamily' => 'берилл',
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade' => StoneGradeBuilderEnum::SECOND_GRADE->value,
        'opticalEffect' => 'плеохроизм',
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
        'stoneFamily' => 'берилл',
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade' => StoneGradeBuilderEnum::SECOND_GRADE->value,
        'opticalEffect' => 'кошачий глаз',
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
        'stoneFamily' => 'силикат',
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade' => StoneGradeBuilderEnum::FORTH_GRADE->value,
        'opticalEffect' => 'плеохроизм',
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

    /******************** ЮВЕЛИРНО-ПОДЕЛОЧНЫЕ КАМНИ *************************/
    [
        'stoneName' => 'авантюрин',
        'stoneDescription' => 'Авантюрин – одна из разновидностей кварца. Его название происходит от итальянского avventura и переводится как «случайность» или «приключение».',
        'altStoneName' => 'Зеленый авантюрин называют Индийским Жадом или Императорским камнем',
        'stoneFamily' => 'кварц',
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERY_ORNAMENTAL->value,
        'stoneGrade' => StoneGradeBuilderEnum::SECOND_GRADE->value,
        'opticalEffect' => null,
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
        'stoneFamily' => 'кварц',
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERY_ORNAMENTAL->value,
        'stoneGrade' => StoneGradeBuilderEnum::FIRST_GRADE->value,
        'opticalEffect' => null,
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
        'stoneFamily' => 'полевой шпат',
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERY_ORNAMENTAL->value,
        'stoneGrade' => StoneGradeBuilderEnum::SECOND_GRADE->value,
        'opticalEffect' => 'адуляресценция',
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
            [FacetBuilderEnum::PEAR_CUT->value, 20],
            [FacetBuilderEnum::OVAL_CUT->value, 20]
        ]
    ],
    [
        'stoneName' => 'азурит',
        'stoneDescription' => 'Обладает довольно редким и особым синим цветом, камень был прозван по-персидски - «синева». Идеально подходит форма кабошона, из-за мягкости огранка не применяется',
        'altStoneName' => 'медная лазурь, шессилит',
        'stoneFamily' => 'карбонат',
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERY_ORNAMENTAL->value,
        'stoneGrade' => StoneGradeBuilderEnum::FIRST_GRADE->value,
        'opticalEffect' => null,
        'colours' => [
            ColourBuilderEnum::LIGHT_BLUE->value,
            ColourBuilderEnum::BLUE->value,
        ],
        'facets' => [
            [FacetBuilderEnum::CABOCHON_ROUND->value, 45],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 45],
            [FacetBuilderEnum::PEAR_CUT->value, 5],
            [FacetBuilderEnum::OVAL_CUT->value, 5]
        ]
    ],
    [
        'stoneName' => 'актинолит',
        'stoneDescription' => 'Ювелирные разновидности богатого хромом актинолита в огранке смотрятся почти как изумруд высоких цветов',
        'altStoneName' => 'лучистый камень',
        'stoneFamily' => 'силикат',
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERY_ORNAMENTAL->value,
        'stoneGrade' => StoneGradeBuilderEnum::SECOND_GRADE->value,
        'opticalEffect' => null,
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
            [FacetBuilderEnum::PEAR_CUT->value, 5],
            [FacetBuilderEnum::OVAL_CUT->value, 5]
        ]
    ],

    /******************** ПОДЕЛОЧНЫЕ КАМНИ *************************/
    [
        'stoneName' => 'агальматалит',
        'stoneDescription' => 'Агальматолит — это минерал, который относится к группе слоистых силикатов. Он известен своими нежными пастельными оттенками и гладкой шелковистой текстурой. Агальматолит часто используется в качестве материала для резьбы и изготовления скульптур, а также в ювелирных изделиях. Минерал был известен в Китае с древних времен, где его ценили за красоту и считали символом благополучия и долголетия.',
        'altStoneName' => 'Пирофиллит, фудзянский жад, ледяной камень',
        'stoneFamily' => 'силикат',
        'stoneGroup' => StoneGroupBuilderEnum::ORNAMENTAL->value,
        'stoneGrade' => null,
        'opticalEffect' => null,
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