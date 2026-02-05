<?php
declare(strict_types=1);

use JewelleryDomain\Jewelleries\Inserts\Facets\Enums\FacetBuilderEnum;
use JewelleryDomain\Jewelleries\Inserts\OpticalEffects\Enums\OpticalEffectBuilderEnum;
use JewelleryDomain\Jewelleries\Inserts\StoneColours\Enums\StoneColourBuilderEnum;
use JewelleryDomain\Jewelleries\Inserts\StoneFamilies\Enums\StoneFamilyBuilderEnum;
use JewelleryDomain\Jewelleries\Inserts\StoneGrades\Enums\StoneGradeBuilderEnum;
use JewelleryDomain\Jewelleries\Inserts\StoneGroups\Enums\StoneGroupBuilderEnum;
use JewelleryDomain\Jewelleries\Inserts\Stones\Enums\StoneBuilderEnum;
use JewelleryDomain\Jewelleries\Inserts\TypeOrigins\Enums\TypeOriginBuilderEnum;

return [
    [
        'stoneName'        => StoneBuilderEnum::AQUAMARINE->value,
        'stoneDescription' => 'Аквамарин - ювелирная разновидность минерала берилла голубого или зеленовато-голубого цвета. Название камня произошло от латинского aqua marina – «морская вода», поскольку цвет камня напоминает теплые тропические моря.',
        'altStoneName'     => 'Санта Мария, берудж, голубой берилл',
        'typeOrigin'       => TypeOriginBuilderEnum::NATURE->value,
        'stoneFamily'      => StoneFamilyBuilderEnum::BERYL->value,
        'stoneGroup'       => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade'       => StoneGradeBuilderEnum::SECOND_GRADE->value,
        'opticalEffect'    => OpticalEffectBuilderEnum::PLEOCHROISM->value,
        'colours'          => [
            [StoneColourBuilderEnum::LIGHT_BLUE->value, 50],
            [StoneColourBuilderEnum::BLUE->value, 50],
        ],
        'facets'           => [
            [FacetBuilderEnum::EMERALD_CUT->value, 20],
            [FacetBuilderEnum::ASSCHER_CUT->value, 20],
            [FacetBuilderEnum::ROUND_CUT->value, 20],
            [FacetBuilderEnum::OVAL_CUT->value, 20],
            [FacetBuilderEnum::RADIANT_CUT->value, 20]
        ]
    ],
    [
        'stoneName'        => StoneBuilderEnum::AQUAMARINE_CAT_EYE->value,
        'stoneDescription' => 'Аквамарин «кошачий глаз» — это редкая разновидность берилла с эффектом «кошачьего глаза», а аквамарин — это камень без этого эффекта. Главное отличие в том, что «кошачий глаз» имеет переливчатость и обычно обрабатывается в виде кабошона, а стандартный аквамарин чаще фасетной огранки. ',
        'altStoneName'     => 'берилл с эффектом кошачьего глаза',
        'typeOrigin'       => TypeOriginBuilderEnum::NATURE->value,
        'stoneFamily'      => StoneFamilyBuilderEnum::BERYL->value,
        'stoneGroup'       => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade'       => StoneGradeBuilderEnum::SECOND_GRADE->value,
        'opticalEffect'    => OpticalEffectBuilderEnum::CATS_YEY->value,
        'colours'          => [
            [StoneColourBuilderEnum::LIGHT_BLUE->value, 50],
            [StoneColourBuilderEnum::BLUE->value, 50],
        ],
        'facets'           => [
            [FacetBuilderEnum::CABOCHON_ROUND->value, 30],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 30]
        ]
    ],
    [
        'stoneName'        => StoneBuilderEnum::AXINITE->value,
        'stoneDescription' => 'Один из немногих камней, которые могут производить в себе различные цвета в зависимости от падающего на них света. Если смотреть на него под разными углами, то они будут выдавать в своём теле различные оттенки, ранее в них не замеченные.',
        'altStoneName'     => 'севергинит, тумит',
        'typeOrigin'       => TypeOriginBuilderEnum::NATURE->value,
        'stoneFamily'      => StoneFamilyBuilderEnum::SILICATE->value,
        'stoneGroup'       => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade'       => StoneGradeBuilderEnum::FORTH_GRADE->value,
        'opticalEffect'    => OpticalEffectBuilderEnum::PLEOCHROISM->value,
        'colours'          => [
            [StoneColourBuilderEnum::BROWN->value, 25],
            [StoneColourBuilderEnum::BLUE->value, 25],
            [StoneColourBuilderEnum::YELLOW->value, 25],
            [StoneColourBuilderEnum::PURPLE->value, 25]
        ],
        'facets'           => [
            [FacetBuilderEnum::CABOCHON_ROUND->value, 30],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 30],
            [FacetBuilderEnum::ROUND_CUT->value, 20],
            [FacetBuilderEnum::OVAL_CUT->value, 20]
        ]
    ],
    [
        'stoneName'        => StoneBuilderEnum::ALMANDINE_GARNET->value,
        'stoneDescription' => 'Альмандин — это разновидность граната, силикат железа и алюминия, известный своей высокой твердостью и широким спектром красных, красно-фиолетовых и красно-бурых оттенков. Один из самых распространенных видов граната, используемый в ювелирном деле для изготовления украшений',
        'altStoneName'     => 'карбункул, алабандская венисса',
        'typeOrigin'       => TypeOriginBuilderEnum::NATURE->value,
        'stoneFamily'      => StoneFamilyBuilderEnum::POMEGRANATE->value,
        'stoneGroup'       => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade'       => StoneGradeBuilderEnum::THIRD_GRADE->value,
        'opticalEffect'    => '',
        'colours'          => [
            [StoneColourBuilderEnum::RED->value, 100]
        ],
        'facets'           => [
            [FacetBuilderEnum::ROUND_CUT->value, 35],
            [FacetBuilderEnum::OVAL_CUT->value, 35],
            [FacetBuilderEnum::TRILLION_CUT->value, 10],
            [FacetBuilderEnum::MARQUISE_CUT->value, 10],
            [FacetBuilderEnum::EMERALD_CUT->value, 10],
        ]
    ],
    [
        'stoneName'        => StoneBuilderEnum::AMETHYST->value,
        'stoneDescription' => 'Аметист — это ювелирный фиолетовый камень, разновидность кварца, популярный в ювелирном деле. Он ценится за свой насыщенный цвет, который варьируется от нежного лилового до тёмно-пурпурного.',
        'altStoneName'     => 'аметистовый кварц, камень Бахуса',
        'typeOrigin'       => TypeOriginBuilderEnum::NATURE->value,
        'stoneFamily'      => StoneFamilyBuilderEnum::QUARTZ->value,
        'stoneGroup'       => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade'       => StoneGradeBuilderEnum::THIRD_GRADE->value,
        'opticalEffect'    => '',
        'colours'          => [
            [StoneColourBuilderEnum::PURPLE->value, 50],
            [StoneColourBuilderEnum::LILAC->value, 50]
        ],
        'facets'           => [
            [FacetBuilderEnum::CABOCHON_ROUND->value, 20],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 20],
            [FacetBuilderEnum::ROUND_CUT->value, 20],
            [FacetBuilderEnum::OVAL_CUT->value, 20],
            [FacetBuilderEnum::TRILLION_CUT->value, 10],
            [FacetBuilderEnum::PEAR_CUT->value, 10],
        ]
    ],
    [
        'stoneName'        => StoneBuilderEnum::AMETRINE->value,
        'stoneDescription' => 'Аметрин (боливианит, аметист-цитрин, двухцветный аметист) — одна из разновидностей кварца, выделяемых по цвету. Редкой красивой окраски, которая распределяется в кристалле неравномерно или зонально, с чередующимися участками аметистового и цитринового цвета.',
        'altStoneName'     => 'боливианит, аметист-цитрин, двухцветный аметист',
        'typeOrigin'       => TypeOriginBuilderEnum::NATURE->value,
        'stoneFamily'      => StoneFamilyBuilderEnum::QUARTZ->value,
        'stoneGroup'       => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade'       => StoneGradeBuilderEnum::THIRD_GRADE->value,
        'opticalEffect'    => OpticalEffectBuilderEnum::TWO_COLOURED->value,
        'colours'          => [
            [StoneColourBuilderEnum::YELLOW->value, 40],
            [StoneColourBuilderEnum::PURPLE->value, 30],
            [StoneColourBuilderEnum::LILAC->value, 30]
        ],
        'facets'           => [
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
        'stoneName'        => StoneBuilderEnum::ANDALUSITE->value,
        'stoneDescription' => 'Для андалузита характерен плеохроизм, который придает ему особую красоту. Иногда его называют «александритом для бедных» за эту особенность.',
        'altStoneName'     => 'хауденит, кузеранит, апир',
        'typeOrigin'       => TypeOriginBuilderEnum::NATURE->value,
        'stoneFamily'      => StoneFamilyBuilderEnum::SILICATE->value,
        'stoneGroup'       => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade'       => StoneGradeBuilderEnum::FORTH_GRADE->value,
        'opticalEffect'    => OpticalEffectBuilderEnum::PLEOCHROISM->value,
        'colours'          => [
            [StoneColourBuilderEnum::GREEN->value, 20],
            [StoneColourBuilderEnum::BROWN->value, 20],
            [StoneColourBuilderEnum::YELLOW->value, 15],
            [StoneColourBuilderEnum::PINK->value, 15],
            [StoneColourBuilderEnum::RED->value, 15],
            [StoneColourBuilderEnum::GRAY->value, 15],
        ],
        'facets'           => [
            [FacetBuilderEnum::OVAL_CUT->value, 25],
            [FacetBuilderEnum::ROUND_CUT->value, 20],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 15],
            [FacetBuilderEnum::CABOCHON_ROUND->value, 15],
            [FacetBuilderEnum::EMERALD_CUT->value, 15],
            [FacetBuilderEnum::RADIANT_CUT->value, 10],
        ]
    ],
    [
        'stoneName'        => StoneBuilderEnum::ANDRADITE_GARNET->value,
        'stoneDescription' => 'Андрадит – это минерал из группы гранатов, силикат кальция и железа, названный в честь бразильского минералога Жозе Бонифасио де Андрада е Силва. Он имеет разнообразные окраски, включая зеленый, желтый, коричневый, красный и черный, и может быть как прозрачным, так и полупрозрачным',
        'altStoneName'     => 'демантоид, топазолит, мелонит',
        'typeOrigin'       => TypeOriginBuilderEnum::NATURE->value,
        'stoneFamily'      => StoneFamilyBuilderEnum::POMEGRANATE->value,
        'stoneGroup'       => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade'       => StoneGradeBuilderEnum::FORTH_GRADE->value,
        'opticalEffect'    => '',
        'colours'          => [
            [StoneColourBuilderEnum::GREEN->value, 20],
            [StoneColourBuilderEnum::YELLOW->value, 20],
            [StoneColourBuilderEnum::BROWN->value, 20],
            [StoneColourBuilderEnum::RED->value, 20],
            [StoneColourBuilderEnum::BLACK->value, 20],
        ],
        'facets'           => [
            [FacetBuilderEnum::OVAL_CUT->value, 25],
            [FacetBuilderEnum::ROUND_CUT->value, 20],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 15],
            [FacetBuilderEnum::CABOCHON_ROUND->value, 15],
            [FacetBuilderEnum::PEAR_CUT->value, 15],
            [FacetBuilderEnum::CUSHION_CUT->value, 10],
        ]
    ],
    [
        'stoneName'        => StoneBuilderEnum::ACHROITE->value,
        'stoneDescription' => 'Ахроит — это название бесцветной разновидности камня группы турмалинов.',
        'altStoneName'     => 'бесцветный турмалин',
        'typeOrigin'       => TypeOriginBuilderEnum::NATURE->value,
        'stoneFamily'      => StoneFamilyBuilderEnum::TOURMALINE->value,
        'stoneGroup'       => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade'       => StoneGradeBuilderEnum::FORTH_GRADE->value,
        'opticalEffect'    => '',
        'colours'          => [
            [StoneColourBuilderEnum::COLOURLESS->value, 100]
        ],
        'facets'           => [
            [FacetBuilderEnum::OVAL_CUT->value, 25],
            [FacetBuilderEnum::ROUND_CUT->value, 20],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 15],
            [FacetBuilderEnum::CABOCHON_ROUND->value, 15],
            [FacetBuilderEnum::EMERALD_CUT->value, 15],
            [FacetBuilderEnum::RADIANT_CUT->value, 10],
        ]
    ],
    [
        'stoneName'        => StoneBuilderEnum::BIXBITE->value,
        'stoneDescription' => 'Биксбит – чрезвычайно редкая разновидность берилла красного цвета, которая считается одним из самых редких драгоценных камней на Земле.',
        'altStoneName'     => 'красный берилл',
        'typeOrigin'       => TypeOriginBuilderEnum::NATURE->value,
        'stoneFamily'      => StoneFamilyBuilderEnum::BERYL->value,
        'stoneGroup'       => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade'       => StoneGradeBuilderEnum::SECOND_GRADE->value,
        'opticalEffect'    => '',
        'colours'          => [
            [StoneColourBuilderEnum::RED->value, 100]
        ],
        'facets'           => [
            [FacetBuilderEnum::OVAL_CUT->value, 25],
            [FacetBuilderEnum::ROUND_CUT->value, 20],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 15],
            [FacetBuilderEnum::CABOCHON_ROUND->value, 15],
            [FacetBuilderEnum::EMERALD_CUT->value, 15],
            [FacetBuilderEnum::CUSHION_CUT->value, 10],
        ]
    ],
    [
        'stoneName'        => StoneBuilderEnum::BRAZILIANITE->value,
        'stoneDescription' => 'Бразилианит и апатит — единственные фосфаты, которые серьезно используются в ювелирной промышленности. Эти камни по цвету напоминают ярко-желтый хризоберилл или желтый топаз-империал (но несолько зеленее). Бразилианит относительно недавно появился на ювелирном рынке и еще не успел получить широкого признания.',
        'altStoneName'     => 'бразилианит',
        'typeOrigin'       => TypeOriginBuilderEnum::NATURE->value,
        'stoneFamily'      => StoneFamilyBuilderEnum::BERYL->value,
        'stoneGroup'       => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade'       => StoneGradeBuilderEnum::FORTH_GRADE->value,
        'opticalEffect'    => '',
        'colours'          => [
            [StoneColourBuilderEnum::YELLOW->value, 50],
            [StoneColourBuilderEnum::GREEN->value, 50],
        ],
        'facets'           => [
            [FacetBuilderEnum::CABOCHON_OVAL->value, 50],
            [FacetBuilderEnum::CABOCHON_ROUND->value, 50],
        ]
    ],
    [
        'stoneName'        => StoneBuilderEnum::VESUVIANITE->value,
        'stoneDescription' => 'Везувиан прозрачный или полупрозрачный, имеет различные оттенки зелёного, бурого, жёлтого, а его цвет зависит от примесей',
        'altStoneName'     => 'калифорнит, идокраз',
        'typeOrigin'       => TypeOriginBuilderEnum::NATURE->value,
        'stoneFamily'      => StoneFamilyBuilderEnum::SILICATE->value,
        'stoneGroup'       => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade'       => StoneGradeBuilderEnum::FORTH_GRADE->value,
        'opticalEffect'    => '',
        'colours'          => [
            [StoneColourBuilderEnum::YELLOW->value, 20],
            [StoneColourBuilderEnum::GREEN->value, 20],
            [StoneColourBuilderEnum::RED->value, 20],
            [StoneColourBuilderEnum::BLUE->value, 20],
            [StoneColourBuilderEnum::PURPLE->value, 20],
        ],
        'facets'           => [
            [FacetBuilderEnum::OVAL_CUT->value, 25],
            [FacetBuilderEnum::ROUND_CUT->value, 20],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 15],
            [FacetBuilderEnum::CABOCHON_ROUND->value, 15],
            [FacetBuilderEnum::EMERALD_CUT->value, 15],
            [FacetBuilderEnum::CUSHION_CUT->value, 10],
        ]
    ],
    [
        'stoneName'        => StoneBuilderEnum::VERDELITE->value,
        'stoneDescription' => 'Верделит – это зеленая разновидность турмалина. Является наиболее распространенным из благородных турмалинов и ценится за различные оттенки зеленого: от светло-травянистого до насыщенно-изумрудного и темно-зеленого.',
        'altStoneName'     => 'бразильский изумруд',
        'typeOrigin'       => TypeOriginBuilderEnum::NATURE->value,
        'stoneFamily'      => StoneFamilyBuilderEnum::TOURMALINE->value,
        'stoneGroup'       => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade'       => StoneGradeBuilderEnum::THIRD_GRADE->value,
        'opticalEffect'    => '',
        'colours'          => [
            [StoneColourBuilderEnum::GREEN->value, 100],
        ],
        'facets'           => [
            [FacetBuilderEnum::OVAL_CUT->value, 20],
            [FacetBuilderEnum::ROUND_CUT->value, 20],
            [FacetBuilderEnum::EMERALD_CUT->value, 20],
            [FacetBuilderEnum::CUSHION_CUT->value, 20],
            [FacetBuilderEnum::ASSCHER_CUT->value, 20],
        ]
    ],
    [
        'stoneName'        => StoneBuilderEnum::VOROBYEVITE->value,
        'stoneDescription' => 'Этот камень ценится в ювелирном деле за красивый цвет от бледно-розового до насыщенного персикового, прозрачность и возможность обработки. ',
        'altStoneName'     => 'морганит',
        'typeOrigin'       => TypeOriginBuilderEnum::NATURE->value,
        'stoneFamily'      => StoneFamilyBuilderEnum::BERYL->value,
        'stoneGroup'       => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade'       => StoneGradeBuilderEnum::SECOND_GRADE->value,
        'opticalEffect'    => '',
        'colours'          => [
            [StoneColourBuilderEnum::PINK->value, 100]
        ],
        'facets'           => [
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
        'stoneName'        => StoneBuilderEnum::HELIODOR->value,
        'stoneDescription' => 'Гелиодор - это жёлтая и золотистая разновидность минерала берилла. Благодаря своему привлекательному внешнему виду и превосходным физическим характеристикам гелиодор пользуется высоким спросом на ювелирном рынке.',
        'altStoneName'     => 'золотой берилл',
        'typeOrigin'       => TypeOriginBuilderEnum::NATURE->value,
        'stoneFamily'      => StoneFamilyBuilderEnum::BERYL->value,
        'stoneGroup'       => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade'       => StoneGradeBuilderEnum::THIRD_GRADE->value,
        'opticalEffect'    => '',
        'colours'          => [
            [StoneColourBuilderEnum::YELLOW->value, 100]
        ],
        'facets'           => [
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
        'stoneName'        => StoneBuilderEnum::JACINTH->value,
        'stoneDescription' => 'Гиацинт — это драгоценная разновидность минерала циркона, представляющая собой прозрачный красновато-коричневый камень с сильным алмазным блеском.',
        'altStoneName'     => 'циркон',
        'typeOrigin'       => TypeOriginBuilderEnum::NATURE->value,
        'stoneFamily'      => StoneFamilyBuilderEnum::ZIRCON->value,
        'stoneGroup'       => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade'       => StoneGradeBuilderEnum::SECOND_GRADE->value,
        'opticalEffect'    => '',
        'colours'          => [
            [StoneColourBuilderEnum::YELLOW->value, 20],
            [StoneColourBuilderEnum::PINK->value, 20],
            [StoneColourBuilderEnum::ORANGE->value, 20],
            [StoneColourBuilderEnum::RED->value, 20],
            [StoneColourBuilderEnum::BROWN->value, 20],
        ],
        'facets'           => [
            [FacetBuilderEnum::OVAL_CUT->value, 20],
            [FacetBuilderEnum::ROUND_CUT->value, 20],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 20],
            [FacetBuilderEnum::CABOCHON_ROUND->value, 20],
            [FacetBuilderEnum::ASSCHER_CUT->value, 10],
            [FacetBuilderEnum::PEAR_CUT->value, 10],
        ]
    ],
    [
        'stoneName'        => StoneBuilderEnum::HIDDENITE->value,
        'stoneDescription' => 'Гидденит — редкий и пленительный драгоценный камень, который ценится за свой потрясающий зеленый оттенок и уникальные свойства.',
        'altStoneName'     => 'литиевый изумруд',
        'typeOrigin'       => TypeOriginBuilderEnum::NATURE->value,
        'stoneFamily'      => StoneFamilyBuilderEnum::SPODUMENE->value,
        'stoneGroup'       => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade'       => StoneGradeBuilderEnum::SECOND_GRADE->value,
        'opticalEffect'    => '',
        'colours'          => [
            [StoneColourBuilderEnum::GREEN->value, 100]
        ],
        'facets'           => [
            [FacetBuilderEnum::OVAL_CUT->value, 20],
            [FacetBuilderEnum::ROUND_CUT->value, 40],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 20],
            [FacetBuilderEnum::CABOCHON_ROUND->value, 20],
        ]
    ],
    [
        'stoneName'        => StoneBuilderEnum::GOSHENITE->value,
        'stoneDescription' => 'Гошенит это самая чистая форма берилла, поскольку в нем отсутствуют красители и примеси, которые придают драгоценным камням цвет.',
        'altStoneName'     => 'бесцветный берилл',
        'typeOrigin'       => TypeOriginBuilderEnum::NATURE->value,
        'stoneFamily'      => StoneFamilyBuilderEnum::BERYL->value,
        'stoneGroup'       => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade'       => StoneGradeBuilderEnum::THIRD_GRADE->value,
        'opticalEffect'    => '',
        'colours'          => [
            [StoneColourBuilderEnum::COLOURLESS->value, 100]
        ],
        'facets'           => [
            [FacetBuilderEnum::OVAL_CUT->value, 20],
            [FacetBuilderEnum::ROUND_CUT->value, 40],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 20],
            [FacetBuilderEnum::CABOCHON_ROUND->value, 20],
        ]
    ],
    [
        'stoneName'        => StoneBuilderEnum::DEMANTOID->value,
        'stoneDescription' => 'Демантоид — это прозрачная, редкая и ценная ювелирная разновидность зелёного граната-андрадита. Камень имеет зелёный или желтовато-зелёный цвет, иногда с коричневыми оттенками, а его высокий блеск и яркость сделали его популярным у ценителей ювелирного искусства и ассоциирующимся с роскошью',
        'altStoneName'     => 'уральский изумруд, марвелит',
        'typeOrigin'       => TypeOriginBuilderEnum::NATURE->value,
        'stoneFamily'      => StoneFamilyBuilderEnum::POMEGRANATE->value,
        'stoneGroup'       => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade'       => StoneGradeBuilderEnum::FIRST_GRADE->value,
        'opticalEffect'    => '',
        'colours'          => [
            [StoneColourBuilderEnum::GREEN->value, 100]
        ],
        'facets'           => [
            [FacetBuilderEnum::OVAL_CUT->value, 20],
            [FacetBuilderEnum::ROUND_CUT->value, 20],
            [FacetBuilderEnum::PRINCESS_CUT->value, 20],
            [FacetBuilderEnum::CUSHION_CUT->value, 20],
            [FacetBuilderEnum::EMERALD_CUT->value, 10],
            [FacetBuilderEnum::PEAR_CUT->value, 10],
        ]
    ],
    [
        'stoneName'        => StoneBuilderEnum::STAR_DIOPSIDE->value,
        'stoneDescription' => StoneBuilderEnum::STAR_DIOPSIDE->description(),
        'altStoneName'     => 'диопсид чёрная звезда',
        'typeOrigin'       => TypeOriginBuilderEnum::NATURE->value,
        'stoneFamily'      => StoneFamilyBuilderEnum::PYROXENE->value,
        'stoneGroup'       => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade'       => StoneGradeBuilderEnum::THIRD_GRADE->value,
        'opticalEffect'    => OpticalEffectBuilderEnum::ASTERISM->value,
        'colours'          => [
            [StoneColourBuilderEnum::BLACK->value, 100]
        ],
        'facets'           => [
            [FacetBuilderEnum::OVAL_CUT->value, 20],
            [FacetBuilderEnum::ROUND_CUT->value, 40],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 20],
            [FacetBuilderEnum::CABOCHON_ROUND->value, 20],
        ]
    ],
    [
        'stoneName'        => StoneBuilderEnum::RHINE_STONE->value,
        'stoneDescription' => StoneBuilderEnum::RHINE_STONE->description(),
        'altStoneName'     => 'богемский алмаз',
        'typeOrigin'       => TypeOriginBuilderEnum::NATURE->value,
        'stoneFamily'      => StoneFamilyBuilderEnum::QUARTZ->value,
        'stoneGroup'       => StoneGroupBuilderEnum::JEWELLERY_ORNAMENTAL->value,
        'stoneGrade'       => StoneGradeBuilderEnum::SECOND_GRADE->value,
        'opticalEffect'    => '',
        'colours'          => [
            [StoneColourBuilderEnum::COLOURLESS->value, 100]
        ],
        'facets'           => [
            [FacetBuilderEnum::OVAL_CUT->value, 10],
            [FacetBuilderEnum::ROUND_CUT->value, 20],
            [FacetBuilderEnum::PRINCESS_CUT->value, 10],
            [FacetBuilderEnum::CUSHION_CUT->value, 10],
            [FacetBuilderEnum::EMERALD_CUT->value, 10],
            [FacetBuilderEnum::PEAR_CUT->value, 10],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 10],
            [FacetBuilderEnum::CABOCHON_ROUND->value, 20],
        ]
    ],
    [
        'stoneName'        => StoneBuilderEnum::DRAVITE->value,
        'stoneDescription' => StoneBuilderEnum::DRAVITE->description(),
        'altStoneName'     => 'бурый турмалин',
        'typeOrigin'       => TypeOriginBuilderEnum::NATURE->value,
        'stoneFamily'      => StoneFamilyBuilderEnum::TOURMALINE->value,
        'stoneGroup'       => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade'       => StoneGradeBuilderEnum::FORTH_GRADE->value,
        'opticalEffect'    => '',
        'colours'          => [
            [StoneColourBuilderEnum::YELLOW->value, 50],
            [StoneColourBuilderEnum::BROWN->value, 50],
        ],
        'facets'           => [
            [FacetBuilderEnum::OVAL_CUT->value, 10],
            [FacetBuilderEnum::ROUND_CUT->value, 10],
            [FacetBuilderEnum::CABOCHON_ROUND->value, 40],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 40],
        ]
    ],
    [
        'stoneName'        => StoneBuilderEnum::RIVER_PEARL_NATURE->value,
        'stoneDescription' => StoneBuilderEnum::RIVER_PEARL_NATURE->description(),
        'altStoneName'     => 'жемчуг',
        'typeOrigin'       => TypeOriginBuilderEnum::NATURE->value,
        'stoneFamily'      => StoneFamilyBuilderEnum::ORGANOGENIC->value,
        'stoneGroup'       => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade'       => StoneGradeBuilderEnum::SECOND_GRADE->value,
        'opticalEffect'    => '',
        'colours'          => [
            [StoneColourBuilderEnum::YELLOW->value, 20],
            [StoneColourBuilderEnum::WHITE->value, 40],
            [StoneColourBuilderEnum::GREEN->value, 20],
            [StoneColourBuilderEnum::GRAY->value, 20],
        ],
        'facets'           => [
            [FacetBuilderEnum::CABOCHON_OVAL->value, 50],
            [FacetBuilderEnum::CABOCHON_ROUND->value, 50],
        ]
    ],
    [
        'stoneName'        => StoneBuilderEnum::SEA_PEARL_CULTURED->value,
        'stoneDescription' => StoneBuilderEnum::SEA_PEARL_CULTURED->description(),
        'altStoneName'     => 'акойя',
        'typeOrigin'       => TypeOriginBuilderEnum::NATURE->value,
        'stoneFamily'      => StoneFamilyBuilderEnum::ORGANOGENIC->value,
        'stoneGroup'       => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade'       => StoneGradeBuilderEnum::SECOND_GRADE->value,
        'opticalEffect'    => '',
        'colours'          => [
            [StoneColourBuilderEnum::YELLOW->value, 30],
            [StoneColourBuilderEnum::WHITE->value, 40],
            [StoneColourBuilderEnum::BLACK->value, 30],
        ],
        'facets'           => [
            [FacetBuilderEnum::CABOCHON_OVAL->value, 50],
            [FacetBuilderEnum::CABOCHON_ROUND->value, 25],
            [FacetBuilderEnum::PEAR_CUT->value, 25],
        ]
    ],
    [
        'stoneName'        => StoneBuilderEnum::RIVER_PEARL_CULTURED->value,
        'stoneDescription' => StoneBuilderEnum::RIVER_PEARL_CULTURED->description(),
        'altStoneName'     => 'жемчуг речной',
        'typeOrigin'       => TypeOriginBuilderEnum::NATURE->value,
        'stoneFamily'      => StoneFamilyBuilderEnum::ORGANOGENIC->value,
        'stoneGroup'       => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade'       => StoneGradeBuilderEnum::FORTH_GRADE->value,
        'opticalEffect'    => '',
        'colours'          => [
            [StoneColourBuilderEnum::WHITE->value, 100],
        ],
        'facets'           => [
            [FacetBuilderEnum::CABOCHON_OVAL->value, 50],
            [FacetBuilderEnum::CABOCHON_ROUND->value, 25],
            [FacetBuilderEnum::PEAR_CUT->value, 25],
        ]
    ],
    [
        'stoneName'        => StoneBuilderEnum::INDIGOLITE->value,
        'stoneDescription' => StoneBuilderEnum::INDIGOLITE->description(),
        'altStoneName'     => 'синий турмалин',
        'typeOrigin'       => TypeOriginBuilderEnum::NATURE->value,
        'stoneFamily'      => StoneFamilyBuilderEnum::TOURMALINE->value,
        'stoneGroup'       => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade'       => StoneGradeBuilderEnum::THIRD_GRADE->value,
        'opticalEffect'    => '',
        'colours'          => [
            [StoneColourBuilderEnum::BLUE->value, 100],
        ],
        'facets'           => [
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
        'stoneName'        => StoneBuilderEnum::IOLITE->value,
        'stoneDescription' => StoneBuilderEnum::IOLITE->description(),
        'altStoneName'     => 'фиалковый камень, кордиерит',
        'typeOrigin'       => TypeOriginBuilderEnum::NATURE->value,
        'stoneFamily'      => StoneFamilyBuilderEnum::SILICATE->value,
        'stoneGroup'       => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade'       => StoneGradeBuilderEnum::FORTH_GRADE->value,
        'opticalEffect'    => OpticalEffectBuilderEnum::PLEOCHROISM->value,
        'colours'          => [
            [StoneColourBuilderEnum::BLUE->value, 100],
        ],
        'facets'           => [
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
        'stoneName'        => StoneBuilderEnum::CASSITERITE->value,
        'stoneDescription' => StoneBuilderEnum::CASSITERITE->description(),
        'altStoneName'     => 'оловянный камень',
        'typeOrigin'       => TypeOriginBuilderEnum::NATURE->value,
        'stoneFamily'      => StoneFamilyBuilderEnum::RUTILE->value,
        'stoneGroup'       => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade'       => StoneGradeBuilderEnum::FORTH_GRADE->value,
        'opticalEffect'    => '',
        'colours'          => [
            [StoneColourBuilderEnum::BLACK->value, 20],
            [StoneColourBuilderEnum::BROWN->value, 20],
            [StoneColourBuilderEnum::YELLOW->value, 20],
            [StoneColourBuilderEnum::RED->value, 20],
            [StoneColourBuilderEnum::GREEN->value, 10],
            [StoneColourBuilderEnum::BLUE->value, 10],
        ],
        'facets'           => [
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
        'stoneName'        => StoneBuilderEnum::KYANITE->value,
        'stoneDescription' => StoneBuilderEnum::KYANITE->description(),
        'altStoneName'     => 'дистен, цианит',
        'typeOrigin'       => TypeOriginBuilderEnum::NATURE->value,
        'stoneFamily'      => StoneFamilyBuilderEnum::SILICATE->value,
        'stoneGroup'       => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade'       => StoneGradeBuilderEnum::FORTH_GRADE->value,
        'opticalEffect'    => '',
        'colours'          => [
            [StoneColourBuilderEnum::BLUE->value, 100],
        ],
        'facets'           => [
            [FacetBuilderEnum::CABOCHON_ROUND->value, 20],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 20],
            [FacetBuilderEnum::PEAR_CUT->value, 10],
        ]
    ],
    [
        'stoneName'        => StoneBuilderEnum::CLINOHUMITE->value,
        'stoneDescription' => StoneBuilderEnum::CLINOHUMITE->description(),
        'altStoneName'     => 'титаноливин, красный перидот',
        'typeOrigin'       => TypeOriginBuilderEnum::NATURE->value,
        'stoneFamily'      => StoneFamilyBuilderEnum::SILICATE->value,
        'stoneGroup'       => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade'       => StoneGradeBuilderEnum::FORTH_GRADE->value,
        'opticalEffect'    => '',
        'colours'          => [
            [StoneColourBuilderEnum::YELLOW->value, 30],
            [StoneColourBuilderEnum::ORANGE->value, 30],
            [StoneColourBuilderEnum::RED->value, 40],
        ],
        'facets'           => [
            [FacetBuilderEnum::CABOCHON_ROUND->value, 20],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 20],
        ]
    ],
];
