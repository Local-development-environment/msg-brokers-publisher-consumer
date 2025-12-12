<?php

declare(strict_types=1);

namespace Domain\Inserts\Stones\Enums;

enum StoneBuilderEnum: string
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

    /** GROWN */

    case NANO_SPINEL = 'наношпинель';
    case SAPPHIRE_GROWN = 'сапфир выращенный';
    case SAPPHIRE_CHAMELEON_GROWN = 'сапфир хамелеон выращенный';
    case DIAMOND_GROWN = 'бриллиант выращенный';
    case EMERALD_GROWN = 'изумруд выращенный';

    /** IMITATION */

    case CUBIC_ZIRCONIA = 'фианит';
    case MOISSANITE = 'муассанит';
    case OPAL_IMITATION = 'опал имитация';
    case ALPANITE = 'алпанит';
    case EMERALD_NANOSITAL = 'изумруд наноситал';

    public function description(): string
    {
        return match ($this) {
            self::DIAMOND => 'Бриллиант — это ограненный алмаз, который благодаря специальной огранке максимально проявляет свой блеск. Само название происходит от французского слова «brillant» и означает «сверкающий, блестящий».',
            self::ALEXANDRITE => 'Александрит — это редкий минерал, разновидность хризоберилла, известный своей способностью менять цвет в зависимости от освещения. При дневном свете он выглядит зелёным, а при искусственном — приобретает красноватый или фиолетовый оттенок.',
            self::SEE_PEARL_NATURE => 'Жемчуг - натуральный биогенный материал, округлой или неправильной формы, который растёт в раковинах двустворчатых моллюсков, используется в ювелирном деле, близок к сферической форме, округлый или каплевидный.',
            self::EMERALD => 'Изумруд — это прозрачный драгоценный камень зеленого цвета, разновидность минерала берилла. Свой насыщенный цвет он получает благодаря примесям хрома и ванадия. Изумруд ценится очень высоко, входя в одну группу с алмазом, рубином и сапфиром',
            self::RUBY => 'Рубин ценится за свою красоту и используется в украшении царских регалий. Широко используется в ювелирных изделиях, особенно в кольцах и серьгах.',
            self::SAPPHIRE => 'драгоценный камень, относящийся к семейству корундов, который ценится за свою красоту, твердость (уступающую только алмазу) и богатую цветовую гамму',
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
