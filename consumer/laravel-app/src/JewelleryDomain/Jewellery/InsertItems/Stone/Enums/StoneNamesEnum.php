<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewellery\InsertItems\Stone\Enums;

use JewelleryDomain\Jewellery\InsertItems\StoneColour\Enums\StoneColourNamesEnum;

enum StoneNamesEnum: string
{
    /** PRECIOUS */
    case DIAMOND          = 'бриллиант';
    case ALEXANDRITE      = 'александрит';
    case SEA_PEARL_NATURE = 'жемчуг морской натуральный';
    case EMERALD          = 'изумруд';
    case RUBY             = 'рубин';
    case SAPPHIRE         = 'сапфир';

    /** JEWELLERY */
    // The first order
    case DEMANTOID          = 'демантоид';
    case BLACK_OPAL         = 'опал черный';
    case PADPARADSCHA       = 'падпараджа';
    case SAPPHIRE_PINK      = 'сапфир розовый';
    case TANZANITE          = 'танзанит';
    case PARAIBA_TOURMALINE = 'турмалин-параиба';
    case TSAVORITE          = 'цаворит';
    case RED_NOBLE_SPINEL   = 'шпинель красная благородная';

    // Second order
    case AQUAMARINE            = 'аквамарин';
    case AMETRINE              = 'аметрин';
    case BIXBIT                = 'биксбит';
    case MORGANITE             = 'морганит';
    case HYACINTH              = 'гиацинт';
    case HIDDEN                = 'Гидденит';
    case NATURAL_RIVER_PEARLS  = 'речной натуральный жемчуг';
    case CULTURED_SEA_PEARLS   = 'морской культивированный жемчуг';
    case STAR_CORUNDUM         = 'корунд звездчатый';
    case KUNZITE               = 'кунцит';
    case MAXIS                 = 'максис';
    case MALAYA                = 'малайя';
    case WHITE_NOBLE_OPAL      = 'белый опал благородный';
    case NOBLE_FIRE_OPAL       = 'опал огненный благородный';
    case RUBELLITE             = 'рубеллит';
    case SAPPHIRE_GREEN        = 'сапфир зеленый';
    case TOPAZOLITE            = 'топазолит';
    case TOPAZ_IMPERIAL        = 'топаз империал';
    case POLYCHROME_TOURMALINE = 'турмалин полихромный';
    case PHENACITE             = 'фенакит';
    case BLUE_SPINEL           = 'шпинель синяя';
    case PURPLE_SPINEL         = 'шпинель фиолетовая';
    case PINK_SPINEL           = 'шпинель розовая';

    // Third order
    case ALMANDINE        = 'альмандин';
    case AMETHYST         = 'аметист';
    case VERDELITE        = 'верделит';
    case HELIODOR         = 'гелиодор';
    case GOSHENITE        = 'гошенит';
    case STAR_DIOPSIDE    = 'диопсид звездчатый';
    case INDIGOLITE       = 'индиголит';
    case LEUCO_SAPPHIRE   = 'лейкосапфир';
    case PYROPE           = 'пироп';
    case PRASIOLITE       = 'празиолит';
    case SPESSARTINE      = 'спессартин';
    case PINK_TOPAZ       = 'топаз розовый';
    case BLUE_TOPAZ       = 'топаз голубой';
    case YELLOW_TOPAZ     = 'топаз желтый';
    case COLOURLESS_TOPAZ = 'топаз бесцветный';
    case UVAROVITE        = 'уваровит';
    case CHRYSOLITE       = 'хризолит';
    case CYMOPHANE        = 'цимофан';
    case CITRINE          = 'цитрин';

    // Forth order
    case AXINITE               = 'аксинит';
    case ANDALUSITE            = 'андалузит';
    case APATITE               = 'апатит';
    case ANDRADITE             = 'андрадит';
    case ACHROITE              = 'ахроит';
    case BRAZILIANITE          = 'бразилианит';
    case VESUVIAN              = 'везувиан';
    case DANBURITE             = 'данбурит';
    case DRAGS                 = 'дравит';
    case CULTURED_RIVER_PEARLS = 'культивированный речной жемчуг';
    case IOLITE                = 'иолит';
    case TINSTONE              = 'касситерит';
    case KYANITE               = 'кианит';
    case CLINOHUMITE           = 'клиногумит';
    case CLEIOPHANES           = 'клейофан';
    case CORDIERITE            = 'кордиерит';
    case CORNERUPIN            = 'корнерупин';
    case MARMATITE             = 'марматит';
    case MOLDAVITE             = 'молдавит';
    case MORION                = 'морион';
    case NACRE                 = 'перламутр';
    case PRSHIBRAMIT           = 'пршибрамит';
    case PREHNITE              = 'пренит';
    case SCAPOLITE             = 'скаполит';
    case HAWKEYE               = 'соколиный глаз';
    case SPHENE                = 'сфен';
    case TEKTITE               = 'тектит';
    case TIGER_EYE             = 'тигровый глаз';
    case CHROME_DIOPSID        = 'хромдиопсид';
    case SCHEELITIS            = 'шеелит';
    case EUCLASE               = 'эвклаз';
    case EPIDOTE               = 'эпидот';

    /** JEWELLERY ORNAMENTAL */
    // The first order
    case  AGATE           = 'агат';
    case  AZURITE         = 'азурит';
    case  ANIONITE        = 'аниолит';
    case  BLUE_TURQUOISE  = 'бирюза голубая';
    case  GREEN_TURQUOISE = 'бирюза зеленая';
    case  HELIOTROPE      = 'гелиотроп';
    case  DUMORTIERITE    = 'дюмортьерит';
    case  JADEITE         = 'жадеит';
    case  CARNELIAN       = 'карнеол';
    case  CORAL           = 'коралл';
    case  LAPIS_LAZULI    = 'лазурит';
    case  MALACHITE       = 'малахит';
    case  MAMMOTH_BONE    = 'Мамонтовая кость';
    case  NEPHRITIS       = 'нефрит';
    case  ONYX            = 'оникс';
    case  RHODOCHROSITE   = 'родохрозит';
    case  RHODONITE       = 'родонит';
    case  SARDER          = 'сардер';
    case  SAPPHIRINE      = 'сапфирин';
    case  CORNELIAN       = 'сердолик';
    case  IVORY           = 'слоновая кость';
    case  SODALITE        = 'содалит';
    case  SUGILITE        = 'сугилит';
    case  CHRYSOPRASE     = 'хризопраз';
    case  CHRYSOKOLLA     = 'хризоколла';
    case  CHAROITE        = 'чароит';
    case  EUDIALYTE       = 'эвдиалит';
    case  AMBER           = 'янтарь';

    // Second order
    case AVENTURINE   = 'авантюрин';
    case ADULARIA     = 'лунный камень';
    case ACTINOLITE   = 'актинолит';
    case AMAZONITE    = 'амазонит';
    case ASTROFYLITIS = 'астроффилит';
    case BELOMORITE   = 'беломорит';
    case HEMATITE   = 'гематит';
    case RHINESTONE   = 'горный хрусталь';
    case JADE   = 'жад';
    case LABRADORITE   = 'лабрадорит';
    case LARIMAR   = 'ларимар';
    case OBSIDIAN_IRIDESCENT   = 'обсидиан иризирующий';
    case OPAL   = 'опал';
    case PETALITE   = 'петалит';
    case RHODUSITE   = 'родусит';
    case  CIMBIRCITE  = 'симбисцит';
    case SUNSTONE   = 'солнечный камень';
    case SPECTROLITE   = 'спектролит';
    case STAUROLITE   = 'ставролит';
    case TUGTUPITE   = 'тугтупит';
    case ELEOLITHIC   = 'элеолит';
    case JASPER_SMALL_DRAWN   = 'яшма мелкорисунчатая';
    case JASPER_LANDSCAPE   = 'яшма пейзажная';

    /** ORNAMENTAL */
    case AGALMATALITE = 'агальматалит';
    case BRECCIA = 'брекчия';
    case GAGAT = 'гагат';
    case WRITING_GRANITE = 'гранит письменный';
    case GOLDITE = 'златолит';
    case CACHOLONG = 'кахолонг';
    case QUARTZITE = 'кварцит';
    case SERAPHINITIS = 'серафинит';
    case CONGLOMERATE = 'конгломерат';
    case PATTERNED_FLINT = 'кремень рисунчатый';
    case OBSIDIAN = 'обсидиан';
    case PETRIFIED_WOOD = 'окаменелое дерево';
    case MARBLED_ONYX = 'оникс мраморный';
    case OPHIOCALCITE = 'офиокальцит';
    case ORNAMENTAL_PORPHYRIES = 'порфиры декоративные';
    case SELENITE = 'селенит';
    case SERPENTINITE = 'серпентинит';
    case SKARN = 'скарн';
    case SOAPSTONE = 'талькохлорид';
    case THUILITE = 'тулит';
    case FLUORITE = 'флюорит';
    case SHUNGITE = 'шунгит';
    case MONOCHROMATIC_JASPER = 'яшма однотонная';
    case BANDED_JASPER = 'яшма полосчатая';

    /** GROWN STONES */


    /** IMITATION STONES */


    public function stoneColours(): array
    {
        return match ($this) {
            self::DIAMOND               => [
                [StoneColourNamesEnum::BLACK->value, 2],
                [StoneColourNamesEnum::YELLOW->value, 2],
                [StoneColourNamesEnum::BROWN->value, 2],
                [StoneColourNamesEnum::PINK->value, 2],
                [StoneColourNamesEnum::LIGHT_BLUE->value, 2],
                [StoneColourNamesEnum::ORANGE->value, 2],
                [StoneColourNamesEnum::GREEN->value, 2],
                [StoneColourNamesEnum::GRAY->value, 2],
                [StoneColourNamesEnum::PURPLE->value, 2],
                [StoneColourNamesEnum::COLOURLESS->value, 82],
            ],
            self::ALEXANDRITE           => [
                [StoneColourNamesEnum::GREEN->value, 100]
            ],
            self::SEA_PEARL_NATURE      => [
                [StoneColourNamesEnum::BLACK->value, 5],
                [StoneColourNamesEnum::WHITE->value, 80],
                [StoneColourNamesEnum::LIGHT_BLUE->value, 5],
                [StoneColourNamesEnum::GREEN->value, 5],
                [StoneColourNamesEnum::BROWN->value, 5],
            ],
            self::EMERALD               => [
                [StoneColourNamesEnum::GREEN->value, 100],
            ],
            self::RUBY                  => [
                [StoneColourNamesEnum::RED->value, 100],
            ],
            self::SAPPHIRE              => [
                [StoneColourNamesEnum::BLUE->value, 100],
            ],
            self::DEMANTOID             => [
                [StoneColourNamesEnum::GREEN->value, 95],
                [StoneColourNamesEnum::YELLOW->value, 5],
            ],
            self::BLACK_OPAL            => [
                [StoneColourNamesEnum::BLACK->value, 100],
            ],
            self::PADPARADSCHA          => [
                [StoneColourNamesEnum::ORANGE->value, 100],
            ],
            self::SAPPHIRE_PINK         => [
                [StoneColourNamesEnum::PINK->value, 100],
            ],
            self::TANZANITE             => [
                [StoneColourNamesEnum::BROWN->value, 10],
                [StoneColourNamesEnum::GREEN->value, 10],
                [StoneColourNamesEnum::COLOURLESS->value, 10],
                [StoneColourNamesEnum::BLUE->value, 60],
                [StoneColourNamesEnum::PINK->value, 10],
            ],
            self::PARAIBA_TOURMALINE    => throw new \Exception('To be implemented'),
            self::TSAVORITE             => throw new \Exception('To be implemented'),
            self::RED_NOBLE_SPINEL      => throw new \Exception('To be implemented'),
            self::AQUAMARINE            => throw new \Exception('To be implemented'),
            self::AMETRINE              => throw new \Exception('To be implemented'),
            self::BIXBIT                => throw new \Exception('To be implemented'),
            self::MORGANITE             => throw new \Exception('To be implemented'),
            self::HYACINTH              => throw new \Exception('To be implemented'),
            self::HIDDEN                => throw new \Exception('To be implemented'),
            self::NATURAL_RIVER_PEARLS  => throw new \Exception('To be implemented'),
            self::CULTURED_SEA_PEARLS   => throw new \Exception('To be implemented'),
            self::STAR_CORUNDUM         => throw new \Exception('To be implemented'),
            self::KUNZITE               => throw new \Exception('To be implemented'),
            self::MAXIS                 => throw new \Exception('To be implemented'),
            self::MALAYA                => throw new \Exception('To be implemented'),
            self::WHITE_NOBLE_OPAL      => throw new \Exception('To be implemented'),
            self::NOBLE_FIRE_OPAL       => throw new \Exception('To be implemented'),
            self::RUBELLITE             => throw new \Exception('To be implemented'),
            self::SAPPHIRE_GREEN        => throw new \Exception('To be implemented'),
            self::TOPAZOLITE            => throw new \Exception('To be implemented'),
            self::TOPAZ_IMPERIAL        => throw new \Exception('To be implemented'),
            self::POLYCHROME_TOURMALINE => throw new \Exception('To be implemented'),
            self::PHENACITE             => throw new \Exception('To be implemented'),
            self::BLUE_SPINEL           => throw new \Exception('To be implemented'),
            self::PURPLE_SPINEL         => throw new \Exception('To be implemented'),
            self::PINK_SPINEL           => throw new \Exception('To be implemented'),
            self::ALMANDINE             => throw new \Exception('To be implemented'),
            self::AMETHYST              => throw new \Exception('To be implemented'),
            self::VERDELITE             => throw new \Exception('To be implemented'),
            self::HELIODOR              => throw new \Exception('To be implemented'),
            self::GOSHENITE             => throw new \Exception('To be implemented'),
            self::STAR_DIOPSIDE         => throw new \Exception('To be implemented'),
            self::INDIGOLITE            => throw new \Exception('To be implemented'),
            self::LEUCO_SAPPHIRE        => throw new \Exception('To be implemented'),
            self::PYROPE                => throw new \Exception('To be implemented'),
            self::PRASIOLITE            => throw new \Exception('To be implemented'),
            self::SPESSARTINE           => throw new \Exception('To be implemented'),
            self::PINK_TOPAZ            => throw new \Exception('To be implemented'),
            self::BLUE_TOPAZ            => throw new \Exception('To be implemented'),
            self::YELLOW_TOPAZ          => throw new \Exception('To be implemented'),
            self::COLOURLESS_TOPAZ      => throw new \Exception('To be implemented'),
            self::UVAROVITE             => throw new \Exception('To be implemented'),
            self::CHRYSOLITE            => throw new \Exception('To be implemented'),
            self::CYMOPHANE             => throw new \Exception('To be implemented'),
            self::CITRINE               => throw new \Exception('To be implemented'),
            self::AXINITE               => throw new \Exception('To be implemented'),
            self::ANDALUSITE            => throw new \Exception('To be implemented'),
            self::APATITE               => throw new \Exception('To be implemented'),
            self::ANDRADITE             => throw new \Exception('To be implemented'),
            self::ACHROITE              => throw new \Exception('To be implemented'),
            self::BRAZILIANITE          => throw new \Exception('To be implemented'),
            self::VESUVIAN              => throw new \Exception('To be implemented'),
            self::DANBURITE             => throw new \Exception('To be implemented'),
            self::DRAGS                 => throw new \Exception('To be implemented'),
            self::CULTURED_RIVER_PEARLS => throw new \Exception('To be implemented'),
            self::IOLITE                => throw new \Exception('To be implemented'),
            self::TINSTONE              => throw new \Exception('To be implemented'),
            self::KYANITE               => throw new \Exception('To be implemented'),
            self::CLINOHUMITE           => throw new \Exception('To be implemented'),
            self::CLEIOPHANES           => throw new \Exception('To be implemented'),
            self::CORDIERITE            => throw new \Exception('To be implemented'),
            self::CORNERUPIN            => throw new \Exception('To be implemented'),
            self::MARMATITE             => throw new \Exception('To be implemented'),
            self::MOLDAVITE             => throw new \Exception('To be implemented'),
            self::MORION                => throw new \Exception('To be implemented'),
            self::NACRE                 => throw new \Exception('To be implemented'),
            self::PRSHIBRAMIT           => throw new \Exception('To be implemented'),
            self::PREHNITE              => throw new \Exception('To be implemented'),
            self::SCAPOLITE             => throw new \Exception('To be implemented'),
            self::HAWKEYE               => throw new \Exception('To be implemented'),
            self::SPHENE                => throw new \Exception('To be implemented'),
            self::TEKTITE               => throw new \Exception('To be implemented'),
            self::TIGER_EYE             => throw new \Exception('To be implemented'),
            self::CHROME_DIOPSID        => throw new \Exception('To be implemented'),
            self::SCHEELITIS            => throw new \Exception('To be implemented'),
            self::EUCLASE               => throw new \Exception('To be implemented'),
            self::EPIDOTE               => throw new \Exception('To be implemented'),
            self::AGATE                 => throw new \Exception('To be implemented'),
            self::AZURITE               => throw new \Exception('To be implemented'),
            self::ANIONITE              => throw new \Exception('To be implemented'),
            self::BLUE_TURQUOISE        => throw new \Exception('To be implemented'),
            self::GREEN_TURQUOISE       => throw new \Exception('To be implemented'),
            self::HELIOTROPE            => throw new \Exception('To be implemented'),
            self::DUMORTIERITE          => throw new \Exception('To be implemented'),
            self::JADEITE               => throw new \Exception('To be implemented'),
            self::CARNELIAN             => throw new \Exception('To be implemented'),
            self::CORAL                 => throw new \Exception('To be implemented'),
            self::LAPIS_LAZULI          => throw new \Exception('To be implemented'),
            self::MALACHITE             => throw new \Exception('To be implemented'),
            self::MAMMOTH_BONE          => throw new \Exception('To be implemented'),
            self::NEPHRITIS             => throw new \Exception('To be implemented'),
            self::ONYX                  => throw new \Exception('To be implemented'),
            self::RHODOCHROSITE         => throw new \Exception('To be implemented'),
            self::RHODONITE             => throw new \Exception('To be implemented'),
            self::SARDER                => throw new \Exception('To be implemented'),
            self::SAPPHIRINE            => throw new \Exception('To be implemented'),
            self::CORNELIAN             => throw new \Exception('To be implemented'),
            self::IVORY                 => throw new \Exception('To be implemented'),
            self::SODALITE              => throw new \Exception('To be implemented'),
            self::SUGILITE              => throw new \Exception('To be implemented'),
            self::CHRYSOPRASE           => throw new \Exception('To be implemented'),
            self::CHRYSOKOLLA           => throw new \Exception('To be implemented'),
            self::CHAROITE              => throw new \Exception('To be implemented'),
            self::EUDIALYTE             => throw new \Exception('To be implemented'),
            self::AMBER                 => throw new \Exception('To be implemented'),
            self::AVENTURINE            => throw new \Exception('To be implemented'),
            self::ADULARIA              => throw new \Exception('To be implemented'),
            self::ACTINOLITE            => throw new \Exception('To be implemented'),
            self::AMAZONITE             => throw new \Exception('To be implemented'),
            self::ASTROFYLITIS          => throw new \Exception('To be implemented'),
            self::BELOMORITE            => throw new \Exception('To be implemented'),
            self::HEMATITE              => throw new \Exception('To be implemented'),
            self::RHINESTONE            => throw new \Exception('To be implemented'),
            self::JADE                  => throw new \Exception('To be implemented'),
            self::LABRADORITE           => throw new \Exception('To be implemented'),
            self::LARIMAR               => throw new \Exception('To be implemented'),
            self::OBSIDIAN_IRIDESCENT   => throw new \Exception('To be implemented'),
            self::OPAL                  => throw new \Exception('To be implemented'),
            self::PETALITE              => throw new \Exception('To be implemented'),
            self::RHODUSITE             => throw new \Exception('To be implemented'),
            self::CIMBIRCITE            => throw new \Exception('To be implemented'),
            self::SUNSTONE              => throw new \Exception('To be implemented'),
            self::SPECTROLITE           => throw new \Exception('To be implemented'),
            self::STAUROLITE            => throw new \Exception('To be implemented'),
            self::TUGTUPITE             => throw new \Exception('To be implemented'),
            self::ELEOLITHIC            => throw new \Exception('To be implemented'),
            self::JASPER_SMALL_DRAWN    => throw new \Exception('To be implemented'),
            self::JASPER_LANDSCAPE      => throw new \Exception('To be implemented'),
            self::AGALMATALITE          => throw new \Exception('To be implemented'),
            self::BRECCIA               => throw new \Exception('To be implemented'),
            self::GAGAT                 => throw new \Exception('To be implemented'),
            self::WRITING_GRANITE       => throw new \Exception('To be implemented'),
            self::GOLDITE               => throw new \Exception('To be implemented'),
            self::CACHOLONG             => throw new \Exception('To be implemented'),
            self::QUARTZITE             => throw new \Exception('To be implemented'),
            self::SERAPHINITIS          => throw new \Exception('To be implemented'),
            self::CONGLOMERATE          => throw new \Exception('To be implemented'),
            self::PATTERNED_FLINT       => throw new \Exception('To be implemented'),
            self::OBSIDIAN              => throw new \Exception('To be implemented'),
            self::PETRIFIED_WOOD        => throw new \Exception('To be implemented'),
            self::MARBLED_ONYX          => throw new \Exception('To be implemented'),
            self::OPHIOCALCITE          => throw new \Exception('To be implemented'),
            self::ORNAMENTAL_PORPHYRIES => throw new \Exception('To be implemented'),
            self::SELENITE              => throw new \Exception('To be implemented'),
            self::SERPENTINITE          => throw new \Exception('To be implemented'),
            self::SKARN                 => throw new \Exception('To be implemented'),
            self::SOAPSTONE             => throw new \Exception('To be implemented'),
            self::THUILITE              => throw new \Exception('To be implemented'),
            self::FLUORITE              => throw new \Exception('To be implemented'),
            self::SHUNGITE              => throw new \Exception('To be implemented'),
            self::MONOCHROMATIC_JASPER  => throw new \Exception('To be implemented'),
            self::BANDED_JASPER         => throw new \Exception('To be implemented'),
        };
    }
}

