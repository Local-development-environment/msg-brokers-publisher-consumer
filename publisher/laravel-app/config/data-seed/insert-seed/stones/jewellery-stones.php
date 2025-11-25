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
];