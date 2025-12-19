<?php

declare(strict_types=1);

namespace Domain\Inserts\NaturalStones\Enums;

use Domain\Inserts\StoneGroups\Enums\StoneGroupBuilderEnum;

enum NatureStoneBuilderEnum: string
{
    /** PRECIOUS */
    case DIAMOND = 'бриллиант';
    case ALEXANDRITE = 'александрит';
    case SEE_PEARL_NATURE = 'жемчуг морской натуральный';
    case EMERALD = 'изумруд';
    case RUBY = 'рубин';
    case SAPPHIRE = 'сапфир';

    /** JEWELLERIES */
    // The First Group
    case DEMANTOID = 'демантоид';

    // Second Group
    case AQUAMARINE = 'аквамарин';
    case AQUAMARINE_CAT_EYE = 'аквамарин кошачий глаз';
    case BIXBITE = 'биксбит';
    case VOROBYEVITE = 'воробьевит';
    case JACINTH = 'гиацинт';
    case HIDDENITE = 'гидденит';

    // Third Group
    case ALMANDINE_GARNET = 'гранат альмандин';
    case AMETHYST = 'аметист';
    case AMETRINE = 'аметрин';
    case VERDELITE = 'верделит';
    case HELIODOR = 'гелиодор';
    case GOSHENITE = 'гошенит';

    // Forth Group
    case AXINITE = 'аксинит';
    case ANDALUSITE = 'андалузит';
    case ANDRADITE_GARNET = 'гранат андрадит';
    case ACHROITE = 'ахроит';
    case BRAZILIANITE = 'бразилианит';
    case VESUVIANITE = 'везувиан';

    /** JEWELLERY_ORNAMENTAL */
    // The First Group
    case AGATE = 'агат';
    case AZURITE = 'азурит';

    // Second Group
    case AVENTURINE = 'авантюрин';
    case MOONSTONE = 'лунный камень';
    case ACTINOLITE = 'актинолит';
    case AMAZONITE = 'амазонит';

    /** JEWELLERY_ORNAMENTAL */

    case AGALMATOLITE = 'агальматалит';
    case JET = 'гагат';

    public function groups(): string
    {
        return match ($this) {
            self::DIAMOND,
            self::ALEXANDRITE,
            self::SEE_PEARL_NATURE,
            self::EMERALD,
            self::RUBY,
            self::SAPPHIRE => StoneGroupBuilderEnum::PRECIOUS->value,
            self::DEMANTOID,
            self::AQUAMARINE,
            self::AQUAMARINE_CAT_EYE,
            self::BIXBITE,
            self::VOROBYEVITE,
            self::JACINTH,
            self::HIDDENITE,
            self::ALMANDINE_GARNET,
            self::AMETHYST,
            self::AMETRINE,
            self::VERDELITE,
            self::HELIODOR,
            self::GOSHENITE,
            self::AXINITE,
            self::ANDALUSITE,
            self::ANDRADITE_GARNET,
            self::ACHROITE,
            self::BRAZILIANITE,
            self::VESUVIANITE => StoneGroupBuilderEnum::JEWELLERIES->value,
            self::AGATE,
            self::AZURITE,
            self::AVENTURINE,
            self::MOONSTONE,
            self::ACTINOLITE,
            self::AMAZONITE => StoneGroupBuilderEnum::JEWELLERY_ORNAMENTAL->value,
            self::AGALMATOLITE,
            self::JET => StoneGroupBuilderEnum::ORNAMENTAL->value,
        };
    }
}
