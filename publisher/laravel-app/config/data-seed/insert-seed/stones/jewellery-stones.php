<?php
declare(strict_types=1);

use Domain\Inserts\Colours\Enums\ColourBuilderEnum;
use Domain\Inserts\Facets\Enums\FacetBuilderEnum;
use Domain\Inserts\OpticalEffects\Enums\OpticalEffectBuilderEnum;
use Domain\Inserts\StoneFamilies\Enums\StoneFamilyBuilderEnum;
use Domain\Inserts\StoneGrades\Enums\StoneGradeBuilderEnum;
use Domain\Inserts\StoneGroups\Enums\StoneGroupBuilderEnum;

return [
    [
        'stoneName' => 'аквамарин',
        'stoneDescription' => 'Аквамарин - ювелирная разновидность минерала берилла голубого или зеленовато-голубого цвета. Название камня произошло от латинского aqua marina – «морская вода», поскольку цвет камня напоминает теплые тропические моря.',
        'altStoneName' => 'Санта Мария, берудж, голубой берилл',
        'stoneFamily' => StoneFamilyBuilderEnum::BERYL->value,
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade' => StoneGradeBuilderEnum::SECOND_GRADE->value,
        'opticalEffect' => OpticalEffectBuilderEnum::PLEOCHROISM->value,
        'colours' => [
            [ColourBuilderEnum::LIGHT_BLUE->value, 50],
            [ColourBuilderEnum::BLUE->value, 50],
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
        'stoneFamily' => StoneFamilyBuilderEnum::BERYL->value,
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade' => StoneGradeBuilderEnum::SECOND_GRADE->value,
        'opticalEffect' => OpticalEffectBuilderEnum::CATS_YEY->value,
        'colours' => [
            [ColourBuilderEnum::LIGHT_BLUE->value, 50],
            [ColourBuilderEnum::BLUE->value, 50],
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
        'stoneFamily' => StoneFamilyBuilderEnum::SILICATE->value,
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade' => StoneGradeBuilderEnum::FORTH_GRADE->value,
        'opticalEffect' => OpticalEffectBuilderEnum::PLEOCHROISM->value,
        'colours' => [
            [ColourBuilderEnum::BROWN->value, 25],
            [ColourBuilderEnum::BLUE->value, 25],
            [ColourBuilderEnum::YELLOW->value, 25],
            [ColourBuilderEnum::PURPLE->value, 25]
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
        'stoneFamily' => StoneFamilyBuilderEnum::SILICATE->value,
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade' => StoneGradeBuilderEnum::THIRD_GRADE->value,
        'opticalEffect' => '',
        'colours' => [
            [ColourBuilderEnum::RED->value, 100]
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
        'stoneFamily' => StoneFamilyBuilderEnum::QUARTZ->value,
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade' => StoneGradeBuilderEnum::THIRD_GRADE->value,
        'opticalEffect' => '',
        'colours' => [
            [ColourBuilderEnum::PURPLE->value, 50],
            [ColourBuilderEnum::LILAC->value, 50]
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
    [
        'stoneName' => 'аметрин',
        'stoneDescription' => 'Аметрин (боливианит, аметист-цитрин, двухцветный аметист) — одна из разновидностей кварца, выделяемых по цвету. Редкой красивой окраски, которая распределяется в кристалле неравномерно или зонально, с чередующимися участками аметистового и цитринового цвета.',
        'altStoneName' => 'боливианит, аметист-цитрин, двухцветный аметист',
        'stoneFamily' => StoneFamilyBuilderEnum::QUARTZ->value,
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade' => StoneGradeBuilderEnum::THIRD_GRADE->value,
        'opticalEffect' => OpticalEffectBuilderEnum::TWO_COLOURED->value,
        'colours' => [
            [ColourBuilderEnum::YELLOW->value, 40],
            [ColourBuilderEnum::PURPLE->value, 30],
            [ColourBuilderEnum::LILAC->value, 30]
        ],
        'facets' => [
            [FacetBuilderEnum::OVAL_CUT->value, 20],
            [FacetBuilderEnum::ROUND_CUT->value, 15],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 15],
            [FacetBuilderEnum::CABOCHON_ROUND->value, 15],
            [FacetBuilderEnum::EMERALD_CUT->value, 15],
            [FacetBuilderEnum::RADIANT_CUT->value, 10],
            [FacetBuilderEnum::BAGUETTE_CUT->value, 10],
        ]
    ],
    [
        'stoneName' => 'андалузит',
        'stoneDescription' => 'Для андалузита характерен плеохроизм, который придает ему особую красоту. Иногда его называют «александритом для бедных» за эту особенность.',
        'altStoneName' => 'хауденит, кузеранит, апир',
        'stoneFamily' => StoneFamilyBuilderEnum::SILICATE->value,
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade' => StoneGradeBuilderEnum::FORTH_GRADE->value,
        'opticalEffect' => OpticalEffectBuilderEnum::PLEOCHROISM->value,
        'colours' => [
            [ColourBuilderEnum::GREEN->value, 20],
            [ColourBuilderEnum::BROWN->value, 20],
            [ColourBuilderEnum::YELLOW->value, 15],
            [ColourBuilderEnum::PINK->value, 15],
            [ColourBuilderEnum::RED->value, 15],
            [ColourBuilderEnum::GRAY->value, 15],
        ],
        'facets' => [
            [FacetBuilderEnum::OVAL_CUT->value, 25],
            [FacetBuilderEnum::ROUND_CUT->value, 20],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 15],
            [FacetBuilderEnum::CABOCHON_ROUND->value, 15],
            [FacetBuilderEnum::EMERALD_CUT->value, 15],
            [FacetBuilderEnum::RADIANT_CUT->value, 10],
        ]
    ],
];