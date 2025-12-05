<?php
declare(strict_types=1);

use Domain\Inserts\Colours\Enums\ColourBuilderEnum;
use Domain\Inserts\Facets\Enums\FacetBuilderEnum;
use Domain\Inserts\OpticalEffects\Enums\OpticalEffectBuilderEnum;
use Domain\Inserts\StoneFamilies\Enums\StoneFamilyBuilderEnum;
use Domain\Inserts\StoneGrades\Enums\StoneGradeBuilderEnum;
use Domain\Inserts\StoneGroups\Enums\StoneGroupBuilderEnum;
use Domain\Inserts\Stones\Enums\StoneBuilderEnum;

return [
    [
        'stoneName' => StoneBuilderEnum::AQUAMARINE->value,
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
        'stoneName' => StoneBuilderEnum::AQUAMARINE_CAT_EYE->value,
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
        'stoneName' => StoneBuilderEnum::AXINITE->value,
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
        'stoneName' => StoneBuilderEnum::ALMANDINE_GARNET->value,
        'stoneDescription' => 'Альмандин — это разновидность граната, силикат железа и алюминия, известный своей высокой твердостью и широким спектром красных, красно-фиолетовых и красно-бурых оттенков. Один из самых распространенных видов граната, используемый в ювелирном деле для изготовления украшений',
        'altStoneName' => 'карбункул, алабандская венисса',
        'stoneFamily' => StoneFamilyBuilderEnum::POMEGRANATE->value,
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
        'stoneName' => StoneBuilderEnum::AMETHYST->value,
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
        'stoneName' => StoneBuilderEnum::AMETRINE->value,
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
        'stoneName' => StoneBuilderEnum::ANDALUSITE->value,
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
    [
        'stoneName' => StoneBuilderEnum::ANDRADITE_GARNET->value,
        'stoneDescription' => 'Андрадит – это минерал из группы гранатов, силикат кальция и железа, названный в честь бразильского минералога Жозе Бонифасио де Андрада е Силва. Он имеет разнообразные окраски, включая зеленый, желтый, коричневый, красный и черный, и может быть как прозрачным, так и полупрозрачным',
        'altStoneName' => 'демантоид, топазолит, мелонит',
        'stoneFamily' => StoneFamilyBuilderEnum::POMEGRANATE->value,
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade' => StoneGradeBuilderEnum::FORTH_GRADE->value,
        'opticalEffect' => '',
        'colours' => [
            [ColourBuilderEnum::GREEN->value, 20],
            [ColourBuilderEnum::YELLOW->value, 20],
            [ColourBuilderEnum::BROWN->value, 20],
            [ColourBuilderEnum::RED->value, 20],
            [ColourBuilderEnum::BLACK->value, 20],
        ],
        'facets' => [
            [FacetBuilderEnum::OVAL_CUT->value, 25],
            [FacetBuilderEnum::ROUND_CUT->value, 20],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 15],
            [FacetBuilderEnum::CABOCHON_ROUND->value, 15],
            [FacetBuilderEnum::PEAR_CUT->value, 15],
            [FacetBuilderEnum::CUSHION_CUT->value, 10],
        ]
    ],
    [
        'stoneName' => StoneBuilderEnum::ACHROITE->value,
        'stoneDescription' => 'Ахроит — это название бесцветной разновидности камня группы турмалинов.',
        'altStoneName' => 'бесцветный турмалин',
        'stoneFamily' => StoneFamilyBuilderEnum::TOURMALINE->value,
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade' => StoneGradeBuilderEnum::FORTH_GRADE->value,
        'opticalEffect' => '',
        'colours' => [
            [ColourBuilderEnum::COLOURLESS->value, 100]
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
    [
        'stoneName' => StoneBuilderEnum::BIXBITE->value,
        'stoneDescription' => 'Биксбит – чрезвычайно редкая разновидность берилла красного цвета, которая считается одним из самых редких драгоценных камней на Земле.',
        'altStoneName' => 'красный берилл',
        'stoneFamily' => StoneFamilyBuilderEnum::BERYL->value,
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade' => StoneGradeBuilderEnum::SECOND_GRADE->value,
        'opticalEffect' => '',
        'colours' => [
            [ColourBuilderEnum::RED->value, 100]
        ],
        'facets' => [
            [FacetBuilderEnum::OVAL_CUT->value, 25],
            [FacetBuilderEnum::ROUND_CUT->value, 20],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 15],
            [FacetBuilderEnum::CABOCHON_ROUND->value, 15],
            [FacetBuilderEnum::EMERALD_CUT->value, 15],
            [FacetBuilderEnum::CUSHION_CUT->value, 10],
        ]
    ],
    [
        'stoneName' => StoneBuilderEnum::BRAZILIANITE->value,
        'stoneDescription' => 'Бразилианит и апатит — единственные фосфаты, которые серьезно используются в ювелирной промышленности. Эти камни по цвету напоминают ярко-желтый хризоберилл или желтый топаз-империал (но несолько зеленее). Бразилианит относительно недавно появился на ювелирном рынке и еще не успел получить широкого признания.',
        'altStoneName' => 'бразилианит',
        'stoneFamily' => StoneFamilyBuilderEnum::BERYL->value,
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade' => StoneGradeBuilderEnum::FORTH_GRADE->value,
        'opticalEffect' => '',
        'colours' => [
            [ColourBuilderEnum::YELLOW->value, 50],
            [ColourBuilderEnum::GREEN->value, 50],
        ],
        'facets' => [
            [FacetBuilderEnum::CABOCHON_OVAL->value, 50],
            [FacetBuilderEnum::CABOCHON_ROUND->value, 50],
        ]
    ],
    [
        'stoneName' => StoneBuilderEnum::VESUVIANITE->value,
        'stoneDescription' => 'Везувиан прозрачный или полупрозрачный, имеет различные оттенки зелёного, бурого, жёлтого, а его цвет зависит от примесей',
        'altStoneName' => 'калифорнит, идокраз',
        'stoneFamily' => StoneFamilyBuilderEnum::SILICATE->value,
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade' => StoneGradeBuilderEnum::FORTH_GRADE->value,
        'opticalEffect' => '',
        'colours' => [
            [ColourBuilderEnum::YELLOW->value, 20],
            [ColourBuilderEnum::GREEN->value, 20],
            [ColourBuilderEnum::RED->value, 20],
            [ColourBuilderEnum::BLUE->value, 20],
            [ColourBuilderEnum::PURPLE->value, 20],
        ],
        'facets' => [
            [FacetBuilderEnum::OVAL_CUT->value, 25],
            [FacetBuilderEnum::ROUND_CUT->value, 20],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 15],
            [FacetBuilderEnum::CABOCHON_ROUND->value, 15],
            [FacetBuilderEnum::EMERALD_CUT->value, 15],
            [FacetBuilderEnum::CUSHION_CUT->value, 10],
        ]
    ],
    [
        'stoneName' => StoneBuilderEnum::VERDELITE->value,
        'stoneDescription' => 'Верделит – это зеленая разновидность турмалина. Является наиболее распространенным из благородных турмалинов и ценится за различные оттенки зеленого: от светло-травянистого до насыщенно-изумрудного и темно-зеленого.',
        'altStoneName' => 'бразильский изумруд',
        'stoneFamily' => StoneFamilyBuilderEnum::TOURMALINE->value,
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade' => StoneGradeBuilderEnum::THIRD_GRADE->value,
        'opticalEffect' => '',
        'colours' => [
            [ColourBuilderEnum::GREEN->value, 100],
        ],
        'facets' => [
            [FacetBuilderEnum::OVAL_CUT->value, 20],
            [FacetBuilderEnum::ROUND_CUT->value, 20],
            [FacetBuilderEnum::EMERALD_CUT->value, 20],
            [FacetBuilderEnum::CUSHION_CUT->value, 20],
            [FacetBuilderEnum::ASSCHER_CUT->value, 20],
        ]
    ],
    [
        'stoneName' => StoneBuilderEnum::VOROBYEVITE->value,
        'stoneDescription' => 'Этот камень ценится в ювелирном деле за красивый цвет от бледно-розового до насыщенного персикового, прозрачность и возможность обработки. ',
        'altStoneName' => 'морганит',
        'stoneFamily' => StoneFamilyBuilderEnum::BERYL->value,
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade' => StoneGradeBuilderEnum::SECOND_GRADE->value,
        'opticalEffect' => '',
        'colours' => [
            [ColourBuilderEnum::PINK->value, 100]
        ],
        'facets' => [
            [FacetBuilderEnum::OVAL_CUT->value, 20],
            [FacetBuilderEnum::ROUND_CUT->value, 20],
            [FacetBuilderEnum::EMERALD_CUT->value, 20],
            [FacetBuilderEnum::CUSHION_CUT->value, 10],
            [FacetBuilderEnum::ASSCHER_CUT->value, 10],
            [FacetBuilderEnum::HEART_CUT->value, 10],
            [FacetBuilderEnum::PEAR_CUT->value, 10],
        ]
    ],
    [
        'stoneName' => StoneBuilderEnum::HELIODOR->value,
        'stoneDescription' => 'Гелиодор - это жёлтая и золотистая разновидность минерала берилла. Благодаря своему привлекательному внешнему виду и превосходным физическим характеристикам гелиодор пользуется высоким спросом на ювелирном рынке.',
        'altStoneName' => 'золотой берилл',
        'stoneFamily' => StoneFamilyBuilderEnum::BERYL->value,
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade' => StoneGradeBuilderEnum::THIRD_GRADE->value,
        'opticalEffect' => '',
        'colours' => [
            [ColourBuilderEnum::YELLOW->value, 100]
        ],
        'facets' => [
            [FacetBuilderEnum::OVAL_CUT->value, 20],
            [FacetBuilderEnum::ROUND_CUT->value, 20],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 20],
            [FacetBuilderEnum::CABOCHON_ROUND->value, 10],
            [FacetBuilderEnum::ASSCHER_CUT->value, 10],
            [FacetBuilderEnum::HEART_CUT->value, 10],
            [FacetBuilderEnum::PEAR_CUT->value, 10],
        ]
    ],
    [
        'stoneName' => StoneBuilderEnum::JACINTH->value,
        'stoneDescription' => 'Гиацинт — это драгоценная разновидность минерала циркона, представляющая собой прозрачный красновато-коричневый камень с сильным алмазным блеском.',
        'altStoneName' => 'циркон',
        'stoneFamily' => StoneFamilyBuilderEnum::SILICATE->value,
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade' => StoneGradeBuilderEnum::SECOND_GRADE->value,
        'opticalEffect' => '',
        'colours' => [
            [ColourBuilderEnum::YELLOW->value, 20],
            [ColourBuilderEnum::PINK->value, 20],
            [ColourBuilderEnum::ORANGE->value, 20],
            [ColourBuilderEnum::RED->value, 20],
            [ColourBuilderEnum::BROWN->value, 20],
        ],
        'facets' => [
            [FacetBuilderEnum::OVAL_CUT->value, 20],
            [FacetBuilderEnum::ROUND_CUT->value, 20],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 20],
            [FacetBuilderEnum::CABOCHON_ROUND->value, 20],
            [FacetBuilderEnum::ASSCHER_CUT->value, 10],
            [FacetBuilderEnum::PEAR_CUT->value, 10],
        ]
    ],
    [
        'stoneName' => StoneBuilderEnum::HIDDENITE->value,
        'stoneDescription' => 'Гидденит — редкий и пленительный драгоценный камень, который ценится за свой потрясающий зеленый оттенок и уникальные свойства.',
        'altStoneName' => 'литиевый изумруд',
        'stoneFamily' => StoneFamilyBuilderEnum::SILICATE->value,
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade' => StoneGradeBuilderEnum::SECOND_GRADE->value,
        'opticalEffect' => '',
        'colours' => [
            [ColourBuilderEnum::GREEN->value, 100]
        ],
        'facets' => [
            [FacetBuilderEnum::OVAL_CUT->value, 20],
            [FacetBuilderEnum::ROUND_CUT->value, 40],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 20],
            [FacetBuilderEnum::CABOCHON_ROUND->value, 20],
        ]
    ],
    [
        'stoneName' => StoneBuilderEnum::GOSHENITE->value,
        'stoneDescription' => 'Гошенит это самая чистая форма берилла, поскольку в нем отсутствуют красители и примеси, которые придают драгоценным камням цвет.',
        'altStoneName' => 'бесцветный берилл',
        'stoneFamily' => StoneFamilyBuilderEnum::BERYL->value,
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade' => StoneGradeBuilderEnum::THIRD_GRADE->value,
        'opticalEffect' => '',
        'colours' => [
            [ColourBuilderEnum::COLOURLESS->value, 100]
        ],
        'facets' => [
            [FacetBuilderEnum::OVAL_CUT->value, 20],
            [FacetBuilderEnum::ROUND_CUT->value, 40],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 20],
            [FacetBuilderEnum::CABOCHON_ROUND->value, 20],
        ]
    ],
    [
        'stoneName' => StoneBuilderEnum::DEMANTOID->value,
        'stoneDescription' => 'Демантоид — это прозрачная, редкая и ценная ювелирная разновидность зелёного граната-андрадита. Камень имеет зелёный или желтовато-зелёный цвет, иногда с коричневыми оттенками, а его высокий блеск и яркость сделали его популярным у ценителей ювелирного искусства и ассоциирующимся с роскошью',
        'altStoneName' => 'уральский изумруд, марвелит',
        'stoneFamily' => StoneFamilyBuilderEnum::POMEGRANATE->value,
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade' => StoneGradeBuilderEnum::FIRST_GRADE->value,
        'opticalEffect' => '',
        'colours' => [
            [ColourBuilderEnum::GREEN->value, 100]
        ],
        'facets' => [
            [FacetBuilderEnum::OVAL_CUT->value, 20],
            [FacetBuilderEnum::ROUND_CUT->value, 20],
            [FacetBuilderEnum::PRINCESS_CUT->value, 20],
            [FacetBuilderEnum::CUSHION_CUT->value, 20],
            [FacetBuilderEnum::EMERALD_CUT->value, 10],
            [FacetBuilderEnum::PEAR_CUT->value, 10],
        ]
    ],
];