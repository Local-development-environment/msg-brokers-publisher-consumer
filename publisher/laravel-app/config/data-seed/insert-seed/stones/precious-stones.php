<?php
declare(strict_types=1);

use Domain\Inserts\Colours\Enums\ColourBuilderEnum;
use Domain\Inserts\Facets\Enums\FacetBuilderEnum;
use Domain\Inserts\OpticalEffects\Enums\OpticalEffectBuilderEnum;
use Domain\Inserts\StoneFamilies\Enums\StoneFamilyBuilderEnum;
use Domain\Inserts\StoneGroups\Enums\StoneGroupBuilderEnum;

return [
    [
        'stoneName' => 'александрит',
        'stoneDescription' => 'Александрит — это редкий минерал, разновидность хризоберилла, известный своей способностью менять цвет в зависимости от освещения. При дневном свете он выглядит зелёным, а при искусственном — приобретает красноватый или фиолетовый оттенок.',
        'altStoneName' => 'хризоберилл, вдовий камень',
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
            [FacetBuilderEnum::HEART_CUT->value, 10],
        ]
    ],
    [
        'stoneName' => 'бриллиант',
        'stoneDescription' => 'Бриллиант — это ограненный алмаз, который благодаря специальной огранке максимально проявляет свой блеск. Само название происходит от французского слова «brillant» и означает «сверкающий, блестящий».',
        'altStoneName' => 'диамант, адамант',
        'stoneFamily' => StoneFamilyBuilderEnum::DIAMOND->value,
        'stoneGroup' => StoneGroupBuilderEnum::PRECIOUS->value,
        'stoneGrade' => '',
        'opticalEffect' => '',
        'colours' => [
//            ColourBuilderEnum::GREEN->value,
            ColourBuilderEnum::BROWN->value,
//            ColourBuilderEnum::YELLOW->value,
            ColourBuilderEnum::COLOURLESS->value,
            ColourBuilderEnum::LIGHT_BLUE->value,
            ColourBuilderEnum::BLUE->value,
            ColourBuilderEnum::PINK->value,
//            ColourBuilderEnum::RED->value,
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
    [
        'stoneName' => 'Жемчуг морской натуральный',
        'stoneDescription' => 'Жемчуг - натуральный биогенный материал, округлой или неправильной формы, который растёт в раковинах двустворчатых моллюсков, используется в ювелирном деле, близок к сферической форме, округлый или каплевидный.',
        'altStoneName' => 'маргарит, акойя',
        'stoneFamily' => StoneFamilyBuilderEnum::ORGANOGENIC->value,
        'stoneGroup' => StoneGroupBuilderEnum::PRECIOUS->value,
        'stoneGrade' => '',
        'opticalEffect' => '',
        'colours' => [
            ColourBuilderEnum::GREEN->value,
            ColourBuilderEnum::LIGHT_BLUE->value,
            ColourBuilderEnum::WHITE->value,
            ColourBuilderEnum::GRAY->value,
            ColourBuilderEnum::PURPLE->value,
            ColourBuilderEnum::BLACK->value,
        ],
        'facets' => [
            [FacetBuilderEnum::CABOCHON_ROUND->value, 100],
        ]
    ],
    [
        'stoneName' => 'изумруд',
        'stoneDescription' => '',
        'altStoneName' => 'смарагд',
        'stoneFamily' => StoneFamilyBuilderEnum::BERYL->value,
        'stoneGroup' => StoneGroupBuilderEnum::PRECIOUS->value,
        'stoneGrade' => '',
        'opticalEffect' => OpticalEffectBuilderEnum::PLEOCHROISM->value,
        'colours' => [
            ColourBuilderEnum::GREEN->value
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
        'stoneName' => 'рубин',
        'stoneDescription' => 'Рубин ценится за свою красоту и используется в украшении царских регалий. Широко используется в ювелирных изделиях, особенно в кольцах и серьгах.',
        'altStoneName' => 'лал, красный яхонт и сардис',
        'stoneFamily' => StoneFamilyBuilderEnum::CORUNDUM->value,
        'stoneGroup' => StoneGroupBuilderEnum::JEWELLERIES->value,
        'stoneGrade' => '',
        'opticalEffect' => '',
        'colours' => [
            ColourBuilderEnum::RED->value,
            ColourBuilderEnum::PURPLE->value,
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
        'stoneName' => 'сапфир',
        'stoneDescription' => 'драгоценный камень, относящийся к семейству корундов, который ценится за свою красоту, твердость (уступающую только алмазу) и богатую цветовую гамму',
        'altStoneName' => 'яхонт, цианус',
        'stoneFamily' => StoneFamilyBuilderEnum::CORUNDUM->value,
        'stoneGroup' => StoneGroupBuilderEnum::PRECIOUS->value,
        'stoneGrade' => '',
        'opticalEffect' => OpticalEffectBuilderEnum::PLEOCHROISM->value,
        'colours' => [
            ColourBuilderEnum::BLUE->value
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