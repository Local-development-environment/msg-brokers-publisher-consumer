<?php
declare(strict_types=1);

use Domain\Inserts\Colours\Enums\StoneColourBuilderEnum;
use Domain\Inserts\Facets\Enums\FacetBuilderEnum;
use Domain\Inserts\OpticalEffects\Enums\OpticalEffectBuilderEnum;
use Domain\Inserts\StoneFamilies\Enums\StoneFamilyBuilderEnum;
use Domain\Inserts\StoneGroups\Enums\StoneGroupBuilderEnum;
use Domain\Inserts\Stones\Enums\StoneBuilderEnum;
use Domain\Inserts\TypeOrigins\Enums\TypeOriginBuilderEnum;

return [
    [
        'stoneName' => StoneBuilderEnum::ALEXANDRITE->value,
        'stoneDescription' => 'Александрит — это редкий минерал, разновидность хризоберилла, известный своей способностью менять цвет в зависимости от освещения. При дневном свете он выглядит зелёным, а при искусственном — приобретает красноватый или фиолетовый оттенок.',
        'altStoneName' => 'хризоберилл, вдовий камень',
        'typeOrigin' => TypeOriginBuilderEnum::NATURE->value,
        'stoneFamily' => StoneFamilyBuilderEnum::CHRYSOBERYL->value,
        'stoneGroup' => StoneGroupBuilderEnum::PRECIOUS->value,
        'stoneGrade' => '',
        'opticalEffect' => OpticalEffectBuilderEnum::PLEOCHROISM->value,
        'colours' => [
            [StoneColourBuilderEnum::GREEN->value, 100]
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
            [FacetBuilderEnum::HEART_CUT->value, 10],
        ]
    ],
    [
        'stoneName' => StoneBuilderEnum::DIAMOND->value,
        'stoneDescription' => 'Бриллиант — это ограненный алмаз, который благодаря специальной огранке максимально проявляет свой блеск. Само название происходит от французского слова «brillant» и означает «сверкающий, блестящий».',
        'altStoneName' => 'диамант, адамант',
        'typeOrigin' => TypeOriginBuilderEnum::NATURE->value,
        'stoneFamily' => StoneFamilyBuilderEnum::DIAMOND->value,
        'stoneGroup' => StoneGroupBuilderEnum::PRECIOUS->value,
        'stoneGrade' => '',
        'opticalEffect' => '',
        'colours' => [
            [StoneColourBuilderEnum::GREEN->value, 1],
            [StoneColourBuilderEnum::BROWN->value, 3],
            [StoneColourBuilderEnum::YELLOW->value, 1],
            [StoneColourBuilderEnum::COLOURLESS->value, 60],
            [StoneColourBuilderEnum::LIGHT_BLUE->value, 30],
            [StoneColourBuilderEnum::BLUE->value, 1],
            [StoneColourBuilderEnum::PINK->value, 1],
            [StoneColourBuilderEnum::RED->value, 1],
            [StoneColourBuilderEnum::BLACK->value, 2]
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
    [
        'stoneName' => StoneBuilderEnum::SEA_PEARL_NATURE->value,
        'stoneDescription' => 'Жемчуг - натуральный биогенный материал, округлой или неправильной формы, который растёт в раковинах двустворчатых моллюсков, используется в ювелирном деле, близок к сферической форме, округлый или каплевидный.',
        'altStoneName' => 'маргарит, акойя',
        'typeOrigin' => TypeOriginBuilderEnum::NATURE->value,
        'stoneFamily' => StoneFamilyBuilderEnum::ORGANOGENIC->value,
        'stoneGroup' => StoneGroupBuilderEnum::PRECIOUS->value,
        'stoneGrade' => '',
        'opticalEffect' => '',
        'colours' => [
            [StoneColourBuilderEnum::GREEN->value, 2],
            [StoneColourBuilderEnum::LIGHT_BLUE->value, 30],
            [StoneColourBuilderEnum::WHITE->value, 60],
            [StoneColourBuilderEnum::GRAY->value, 3],
            [StoneColourBuilderEnum::PURPLE->value, 2],
            [StoneColourBuilderEnum::BLACK->value, 3],
        ],
        'facets' => [
            [FacetBuilderEnum::CABOCHON_ROUND->value, 100],
        ]
    ],
    [
        'stoneName' => StoneBuilderEnum::EMERALD->value,
        'stoneDescription' => 'Изумруд — это прозрачный драгоценный камень зеленого цвета, разновидность минерала берилла. Свой насыщенный цвет он получает благодаря примесям хрома и ванадия. Изумруд ценится очень высоко, входя в одну группу с алмазом, рубином и сапфиром',
        'altStoneName' => 'смарагд',
        'typeOrigin' => TypeOriginBuilderEnum::NATURE->value,
        'stoneFamily' => StoneFamilyBuilderEnum::BERYL->value,
        'stoneGroup' => StoneGroupBuilderEnum::PRECIOUS->value,
        'stoneGrade' => '',
        'opticalEffect' => OpticalEffectBuilderEnum::PLEOCHROISM->value,
        'colours' => [
            [StoneColourBuilderEnum::GREEN->value, 100]
        ],
        'facets' => [
            [FacetBuilderEnum::EMERALD_CUT->value, 30],
            [FacetBuilderEnum::ROUND_CUT->value, 30],
            [FacetBuilderEnum::CABOCHON_ROUND->value, 5],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 5],
            [FacetBuilderEnum::PRINCESS_CUT->value, 10],
            [FacetBuilderEnum::CUSHION_CUT->value, 10],
            [FacetBuilderEnum::PEAR_CUT->value, 10],
        ]
    ],
    [
        'stoneName' => StoneBuilderEnum::RUBY->value,
        'stoneDescription' => 'Рубин ценится за свою красоту и используется в украшении царских регалий. Широко используется в ювелирных изделиях, особенно в кольцах и серьгах.',
        'altStoneName' => 'лал, красный яхонт и сардис',
        'typeOrigin' => TypeOriginBuilderEnum::NATURE->value,
        'stoneFamily' => StoneFamilyBuilderEnum::CORUNDUM->value,
        'stoneGroup' => StoneGroupBuilderEnum::PRECIOUS->value,
        'stoneGrade' => '',
        'opticalEffect' => '',
        'colours' => [
            [StoneColourBuilderEnum::RED->value, 80],
            [StoneColourBuilderEnum::PURPLE->value, 20],
        ],
        'facets' => [
            [FacetBuilderEnum::EMERALD_CUT->value, 30],
            [FacetBuilderEnum::ROUND_CUT->value, 30],
            [FacetBuilderEnum::CABOCHON_ROUND->value, 5],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 5],
            [FacetBuilderEnum::PRINCESS_CUT->value, 10],
            [FacetBuilderEnum::CUSHION_CUT->value, 10],
            [FacetBuilderEnum::PEAR_CUT->value, 10],
        ]
    ],
    [
        'stoneName' => StoneBuilderEnum::SAPPHIRE->value,
        'stoneDescription' => 'драгоценный камень, относящийся к семейству корундов, который ценится за свою красоту, твердость (уступающую только алмазу) и богатую цветовую гамму',
        'altStoneName' => 'яхонт, цианус',
        'typeOrigin' => TypeOriginBuilderEnum::NATURE->value,
        'stoneFamily' => StoneFamilyBuilderEnum::CORUNDUM->value,
        'stoneGroup' => StoneGroupBuilderEnum::PRECIOUS->value,
        'stoneGrade' => '',
        'opticalEffect' => OpticalEffectBuilderEnum::PLEOCHROISM->value,
        'colours' => [
            [StoneColourBuilderEnum::BLUE->value, 100]
        ],
        'facets' => [
            [FacetBuilderEnum::EMERALD_CUT->value, 30],
            [FacetBuilderEnum::ROUND_CUT->value, 30],
            [FacetBuilderEnum::CABOCHON_ROUND->value, 5],
            [FacetBuilderEnum::CABOCHON_OVAL->value, 5],
            [FacetBuilderEnum::PRINCESS_CUT->value, 10],
            [FacetBuilderEnum::CUSHION_CUT->value, 10],
            [FacetBuilderEnum::PEAR_CUT->value, 10],
        ]
    ],
];
