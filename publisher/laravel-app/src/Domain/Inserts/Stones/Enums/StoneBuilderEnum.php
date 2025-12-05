<?php

declare(strict_types=1);

namespace Domain\Inserts\Stones\Enums;

enum StoneBuilderEnum: string
{
    case DIAMOND = 'бриллиант';
    case ALEXANDRITE = 'александрит';
    case SEE_PEARL_NATURE = 'жемчуг морской натуральный';
    case EMERALD = 'изумруд';
    case RUBY = 'рубин';
    case SAPPHIRE = 'сапфир';
    case AQUAMARINE = 'аквамарин';
    case AQUAMARINE_CAT_EYE = 'аквамарин кошачий глаз';
    case AXINITE = 'аксинит';
    case ALMANDINE_GARNET = 'гранат альмандин';
    case AMETHYST = 'аметист';
    case AMETRINE = 'аметрин';
    case ANDALUSITE = 'андалузит';
    case ANDRADITE_GARNET = 'гранат андрадит';
    case ACHROITE = 'ахроит';
    case BIXBITE = 'биксбит';
    case BRAZILIANITE = 'бразилианит';
    case VESUVIANITE = 'везувиан';
    case VERDELITE = 'верделит';
    case VOROBYEVITE = 'воробьевит';
    case HELIODOR = 'гелиодор';
    case CUBIC_ZIRCONIA = 'фианит';
    case MOISSANITE = 'муассанит';
    case OPAL_IMITATION = 'опал имитация';
    case ALPANITE = 'алпанит';
    case EMERALD_NANOSITAL = 'изумруд наноситал';
    case AVENTURINE = 'авантюрин';
    case AGATE = 'агат';
    case MOONSTONE = 'лунный камень';
    case AZURITE = 'азурит';
    case ACTINOLITE = 'актинолит';
    case AMAZONITE = 'амазонит';
    case AGALMATOLITE = 'агальматалит';
    case JET = 'гагат';
    case NANO_SPINEL = 'наношпинель';
    case SAPPHIRE_GROWN = 'сапфир выращенный';
    case SAPPHIRE_CHAMELEON_GROWN = 'сапфир хамелеон выращенный';
    case DIAMOND_GROWN = 'бриллиант выращенный';
    case EMERALD_GROWN = 'изумруд выращенный';
    case JACINTH = 'гиацинт';
    case HIDDENITE = 'гидденит';
    case GOSHENITE = 'гошенит';
    case DEMANTOID = 'демантоид';

    public function description(): string
    {
        return match ($this) {
            self::DIAMOND => '',
            self::ALEXANDRITE => '',
            self::SEE_PEARL_NATURE => '',
            self::EMERALD => '',
            self::RUBY => '',
            self::SAPPHIRE => '',
            self::AQUAMARINE => '',
            self::AQUAMARINE_CAT_EYE => '',
            self::AXINITE => '',
            self::ALMANDINE_GARNET => '',
            self::AMETHYST => '',
            self::AMETRINE => '',
            self::ANDALUSITE => '',
            self::ANDRADITE_GARNET => '',
            self::ACHROITE => '',
            self::BIXBITE => '',
            self::BRAZILIANITE => '',
            self::VESUVIANITE => '',
            self::VERDELITE => '',
            self::VOROBYEVITE => '',
            self::HELIODOR => '',
            self::CUBIC_ZIRCONIA => '',
            self::MOISSANITE => '',
            self::OPAL_IMITATION => '',
            self::ALPANITE => '',
            self::EMERALD_NANOSITAL => '',
            self::AVENTURINE => '',
            self::AGATE => '',
            self::MOONSTONE => '',
            self::AZURITE => '',
            self::ACTINOLITE => '',
            self::AMAZONITE => '',
            self::AGALMATOLITE => '',
            self::JET => '',
            self::NANO_SPINEL => '',
            self::SAPPHIRE_GROWN => '',
            self::SAPPHIRE_CHAMELEON_GROWN => '',
            self::DIAMOND_GROWN => '',
            self::EMERALD_GROWN => '',
            self::JACINTH => throw new \Exception('To be implemented'),
            self::HIDDENITE => throw new \Exception('To be implemented'),
            self::GOSHENITE => throw new \Exception('To be implemented'),
            self::DEMANTOID => throw new \Exception('To be implemented'),

        };
    }
}
