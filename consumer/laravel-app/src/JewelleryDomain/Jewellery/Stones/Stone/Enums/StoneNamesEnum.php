<?php

namespace JewelleryDomain\Jewellery\Stones\Stone\Enums;

use JewelleryDomain\Jewellery\StoneExteriors\StoneCabochonForm\Enums\StoneCabochonFormNamesEnum;
use JewelleryDomain\Jewellery\StoneExteriors\StoneCutForm\Enums\StoneCutFormNamesEnum;
use JewelleryDomain\Jewellery\Stones\StoneColour\Enums\StoneColourNamesEnum;

enum StoneNamesEnum: string
{
    /** PRECIOUS */
    case DIAMOND           = 'бриллиант';
    case ALEXANDRITE       = 'александрит';
    case NATURAL_SEA_PEARL = 'жемчуг морской натуральный';
    case EMERALD           = 'изумруд';
    case RUBY              = 'рубин';
    case SAPPHIRE          = 'сапфир';

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
    case AQUAMARINE           = 'аквамарин';
    case AMETRINE             = 'аметрин';
    case BIXBIT               = 'биксбит';
    case MORGANITE            = 'морганит';
    case HYACINTH             = 'гиацинт';
    case HIDDEN               = 'Гидденит';
    case NATURAL_RIVER_PEARLS = 'жемчуг речной натуральный';
    case CULTURED_SEA_PEARLS  = 'жемчуг морской культивированный';
//    case STAR_CORUNDUM         = 'корунд звездчатый'; // can be two corundum - ruby and sapphire
    case STAR_RUBY             = 'рубин звездчатый';
    case STAR_SAPPHIRE         = 'сапфир звездчатый';
    case KUNZITE               = 'кунцит';
    case MAXIS                 = 'максис';
    case MALAYA                = 'малайя';
    case WHITE_NOBLE_OPAL      = 'белый опал благородный';
    case NOBLE_FIRE_OPAL       = 'опал огненный благородный';
    case RUBELLITE             = 'рубеллит';
    case SAPPHIRE_GREEN        = 'сапфир зеленый';
    case SAPPHIRE_YELLOW       = 'сапфир желтый';
    case SAPPHIRE_PURPLE       = 'сапфир фиолетовый';
    case TOPAZOLITE            = 'топазолит';
    case TOPAZ_IMPERIAL        = 'топаз империал';
    case POLYCHROME_TOURMALINE = 'турмалин полихромный';
    case PHENACITE             = 'фенакит';
    case BLUE_SPINEL           = 'шпинель синяя';
    case PURPLE_SPINEL         = 'шпинель фиолетовая';
    case PINK_SPINEL           = 'шпинель розовая';
    case TOURMALINE            = 'турмалин';
    case RHODOLITE             = 'родолит';

    // Third order
    case ALMANDINE        = 'альмандин';
    case GROSSULAR        = 'гроссуляр';
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
    case RUTILATED_QUARTZ = 'рутилоый кварц';

    // Forth order
    case AXINITE               = 'аксинит';
    case ANDALUSITE            = 'андалузит';
    case APATITE               = 'апатит';
    case ANDRADITE             = 'андрадит';
    case ACHROITE              = 'ахроит';
    case BRAZILIANITE          = 'бразилианит';
    case VESUVIAN              = 'везувиан';
    case DANBURITE             = 'данбурит';
    case DRAVITE               = 'дравит';
    case CULTURED_RIVER_PEARLS = 'жемчуг культивированный речной';
    case IOLITE                = 'иолит';
    case CASSITERITE           = 'касситерит';
    case KYANITE               = 'кианит';
    case CLINOHUMITE           = 'клиногумит';
    case CLEIOPHANES           = 'клейофан';
    case CORDIERITE            = 'кордиерит';
    case CORNERUPIN            = 'корнерупин';
    case MARMATITE             = 'марматит';
    case MOLDAVITE             = 'молдавит';
    case MORION                = 'морион';
    case MOTHER_PEARL          = 'перламутр';
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
    case  ANYOLITE        = 'аниолит';
    case  BLUE_TURQUOISE  = 'бирюза голубая';
    case  GREEN_TURQUOISE = 'бирюза зеленая';
    case  HELIOTROPE      = 'гелиотроп';
    case  DUMORTIERITE    = 'дюмортьерит';
    case  JADEITE         = 'жадеит';
    case  CARNELIAN       = 'карнеол';
    case  CORAL           = 'коралл';
    case  LAZURITE        = 'лазурит';
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
    case  AVENTURINE          = 'авантюрин';
    case  ADULARIA            = 'лунный камень';
    case  ACTINOLITE          = 'актинолит';
    case  AMAZONITE           = 'амазонит';
    case  ASTROFYLITIS        = 'астроффилит';
    case  BELOMORITE          = 'беломорит';
    case  HEMATITE            = 'гематит';
    case  RHINESTONE          = 'горный хрусталь';
    case  JADE                = 'жад';
    case  LABRADORITE         = 'лабрадорит';
    case  LARIMAR             = 'ларимар';
    case  OBSIDIAN_IRIDESCENT = 'обсидиан иризирующий';
    case  OPAL                = 'опал';
    case  PETALITE            = 'петалит';
    case  RHODUSITE           = 'родусит';
    case  CIMBIRCITE          = 'симбисцит';
    case  ROSE_QUARTZ         = 'розовый кварц';
    case  SMOKEY_QUARTZ       = 'дымчатый кварц';
    case  SNOW_QUARTZ         = 'льдистый кварц';
    case  SUNSTONE            = 'солнечный камень';
    case  SPECTROLITE         = 'спектролит';
    case  STAUROLITE          = 'ставролит';
    case  TUGTUPITE           = 'тугтупит';
    case  ELEOLITHIC          = 'элеолит';
    case  JASPER_SMALL_DRAWN  = 'яшма мелкорисунчатая';
    case  JASPER_LANDSCAPE    = 'яшма пейзажная';

    /** ORNAMENTAL */
    case AGALMATALITE          = 'агальматалит';
    case BRECCIA               = 'брекчия';
    case GAGAT                 = 'гагат';
    case WRITING_GRANITE       = 'гранит письменный';
    case GOLDITE               = 'златолит';
    case CACHOLONG             = 'кахолонг';
    case QUARTZITE             = 'кварцит';
    case SERAPHINITIS          = 'серафинит';
    case CONGLOMERATE          = 'конгломерат';
    case PATTERNED_FLINT       = 'кремень рисунчатый';
    case OBSIDIAN              = 'обсидиан';
    case PETRIFIED_WOOD        = 'окаменелое дерево';
    case MARBLED_ONYX          = 'оникс мраморный';
    case OPHIOCALCITE          = 'офиокальцит';
    case ORNAMENTAL_PORPHYRIES = 'порфиры декоративные';
    case SELENITE              = 'селенит';
    case SERPENTINITE          = 'серпентинит';
    case SKARN                 = 'скарн';
    case SOAPSTONE             = 'талькохлорид';
    case THUILITE              = 'тулит';
    case FLUORITE              = 'флюорит';
    case SHUNGITE              = 'шунгит';
    case MONOCHROMATIC_JASPER  = 'яшма однотонная';
    case BANDED_JASPER         = 'яшма полосчатая';

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
            self::NATURAL_SEA_PEARL,
            self::NATURAL_RIVER_PEARLS,
            self::CULTURED_SEA_PEARLS,
            self::CULTURED_RIVER_PEARLS => [
                [StoneColourNamesEnum::BLACK->value, 5],
                [StoneColourNamesEnum::WHITE->value, 80],
                [StoneColourNamesEnum::LIGHT_BLUE->value, 5],
                [StoneColourNamesEnum::GREEN->value, 5],
                [StoneColourNamesEnum::BROWN->value, 5],
            ],
            self::EMERALD,
            self::TSAVORITE,
            self::HIDDEN,
            self::SAPPHIRE_GREEN,
            self::ALEXANDRITE,
            self::VERDELITE,
            self::PRASIOLITE,
            self::UVAROVITE,
            self::CHRYSOLITE,
            self::CHROME_DIOPSID,
            self::ANYOLITE,
            self::MALACHITE             => [
                [StoneColourNamesEnum::GREEN->value, 100],
            ],
            self::RUBY,
            self::RED_NOBLE_SPINEL,
            self::BIXBIT,
            self::STAR_RUBY,
            self::ALMANDINE,
            self::PYROPE,
            self::CARNELIAN,
            self::CORAL                 => [
                [StoneColourNamesEnum::RED->value, 40],
                [StoneColourNamesEnum::ORANGE->value, 30],
                [StoneColourNamesEnum::PINK->value, 30],
            ],
            self::SAPPHIRE,
            self::MAXIS,
            self::BLUE_SPINEL,
            self::INDIGOLITE,
            self::BLUE_TOPAZ,
            self::HAWKEYE,
            self::AZURITE,
            self::LAZURITE              => [
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
            self::SAPPHIRE_PINK,
            self::PINK_SPINEL,
            self::PINK_TOPAZ            => [
                [StoneColourNamesEnum::PINK->value, 100],
            ],
            self::TANZANITE             => [
                [StoneColourNamesEnum::BROWN->value, 10],
                [StoneColourNamesEnum::GREEN->value, 10],
                [StoneColourNamesEnum::COLOURLESS->value, 10],
                [StoneColourNamesEnum::BLUE->value, 60],
                [StoneColourNamesEnum::PINK->value, 10],
            ],
            self::PARAIBA_TOURMALINE    => [
                [StoneColourNamesEnum::BLUE->value, 40],
                [StoneColourNamesEnum::GREEN->value, 30],
                [StoneColourNamesEnum::PURPLE->value, 30],
            ],
            self::AQUAMARINE            => [
                [StoneColourNamesEnum::BLUE->value, 50],
                [StoneColourNamesEnum::LIGHT_BLUE->value, 50],
            ],
            self::AMETRINE,
            self::PURPLE_SPINEL,
            self::AMETHYST              => [
                [StoneColourNamesEnum::PURPLE->value, 100],
            ],
            self::MORGANITE             => [
                [StoneColourNamesEnum::PINK->value, 40],
                [StoneColourNamesEnum::ORANGE->value, 30],
                [StoneColourNamesEnum::PURPLE->value, 30],
            ],
            self::HYACINTH,
            self::STAR_SAPPHIRE         => [
                [StoneColourNamesEnum::BLUE->value, 22],
                [StoneColourNamesEnum::LIGHT_BLUE->value, 22],
                [StoneColourNamesEnum::WHITE->value, 8],
                [StoneColourNamesEnum::PINK->value, 8],
                [StoneColourNamesEnum::RED->value, 8],
                [StoneColourNamesEnum::PURPLE->value, 8],
                [StoneColourNamesEnum::LILAC->value, 8],
                [StoneColourNamesEnum::ORANGE->value, 8],
                [StoneColourNamesEnum::YELLOW->value, 8],
            ],
            self::KUNZITE               => [
                [StoneColourNamesEnum::PINK->value, 50],
                [StoneColourNamesEnum::LILAC->value, 50],
            ],
            self::MALAYA                => [
                [StoneColourNamesEnum::ORANGE->value, 50],
                [StoneColourNamesEnum::PINK->value, 50],
            ],
            self::WHITE_NOBLE_OPAL      => [
                [StoneColourNamesEnum::WHITE->value, 100],
            ],
            self::NOBLE_FIRE_OPAL       => [
                [StoneColourNamesEnum::YELLOW->value, 30],
                [StoneColourNamesEnum::ORANGE->value, 30],
                [StoneColourNamesEnum::PINK->value, 40],
            ],
            self::RUBELLITE,
            self::ACHROITE              => [
                [StoneColourNamesEnum::PINK->value, 50],
                [StoneColourNamesEnum::RED->value, 50],
            ],
            self::TOPAZOLITE,
            self::HELIODOR,
            self::CITRINE               => [
                [StoneColourNamesEnum::YELLOW->value, 50],
                [StoneColourNamesEnum::ORANGE->value, 50],
            ],
            self::TOPAZ_IMPERIAL        => [
                [StoneColourNamesEnum::PINK->value, 30],
                [StoneColourNamesEnum::ORANGE->value, 30],
                [StoneColourNamesEnum::RED->value, 40],
            ],
            self::POLYCHROME_TOURMALINE,
            self::IVORY                 => [
                [StoneColourNamesEnum::MULTI_COLOUR->value, 100],
            ],
            self::PHENACITE             => [
                [StoneColourNamesEnum::COLOURLESS->value, 40],
                [StoneColourNamesEnum::WHITE->value, 40],
                [StoneColourNamesEnum::YELLOW->value, 10],
                [StoneColourNamesEnum::PINK->value, 10],
            ],
            self::GOSHENITE             => [
                [StoneColourNamesEnum::WHITE->value, 50],
                [StoneColourNamesEnum::COLOURLESS->value, 50],
            ],
            self::STAR_DIOPSIDE         => [
                [StoneColourNamesEnum::GREEN->value, 10],
                [StoneColourNamesEnum::BLACK->value, 80],
                [StoneColourNamesEnum::COLOURLESS->value, 5],
                [StoneColourNamesEnum::BLUE->value, 5],
            ],
            self::LEUCO_SAPPHIRE,
            self::COLOURLESS_TOPAZ      => [
                [StoneColourNamesEnum::COLOURLESS->value, 100],
            ],
            self::SPESSARTINE           => [
                [StoneColourNamesEnum::YELLOW->value, 30],
                [StoneColourNamesEnum::ORANGE->value, 30],
                [StoneColourNamesEnum::RED->value, 40],
            ],
            self::YELLOW_TOPAZ          => [
                [StoneColourNamesEnum::YELLOW->value, 100],
            ],
            self::CYMOPHANE             => [
                [StoneColourNamesEnum::YELLOW->value, 80],
                [StoneColourNamesEnum::GREEN->value, 20],
            ],
            self::AXINITE               => [
                [StoneColourNamesEnum::PURPLE->value, 20],
                [StoneColourNamesEnum::BLUE->value, 20],
                [StoneColourNamesEnum::PINK->value, 15],
                [StoneColourNamesEnum::YELLOW->value, 15],
                [StoneColourNamesEnum::GRAY->value, 15],
                [StoneColourNamesEnum::ORANGE->value, 15],
            ],
            self::ANDALUSITE            => [
                [StoneColourNamesEnum::YELLOW->value, 15],
                [StoneColourNamesEnum::BROWN->value, 15],
                [StoneColourNamesEnum::GREEN->value, 15],
                [StoneColourNamesEnum::GRAY->value, 15],
                [StoneColourNamesEnum::PINK->value, 15],
                [StoneColourNamesEnum::ORANGE->value, 15],
                [StoneColourNamesEnum::RED->value, 5],
                [StoneColourNamesEnum::COLOURLESS->value, 5],
            ],
            self::APATITE               => [
                [StoneColourNamesEnum::BLUE->value, 15],
                [StoneColourNamesEnum::LIGHT_BLUE->value, 15],
                [StoneColourNamesEnum::GREEN->value, 15],
                [StoneColourNamesEnum::PINK->value, 15],
                [StoneColourNamesEnum::PURPLE->value, 15],
                [StoneColourNamesEnum::YELLOW->value, 15],
                [StoneColourNamesEnum::WHITE->value, 5],
                [StoneColourNamesEnum::COLOURLESS->value, 5],
            ],
            self::ANDRADITE             => [
                [StoneColourNamesEnum::ORANGE->value, 25],
                [StoneColourNamesEnum::BROWN->value, 25],
                [StoneColourNamesEnum::RED->value, 25],
                [StoneColourNamesEnum::BLACK->value, 25],
            ],
            self::BRAZILIANITE          => [
                [StoneColourNamesEnum::GREEN->value, 40],
                [StoneColourNamesEnum::YELLOW->value, 30],
                [StoneColourNamesEnum::COLOURLESS->value, 30],
            ],
            self::VESUVIAN              => [
                [StoneColourNamesEnum::YELLOW->value, 20],
                [StoneColourNamesEnum::GREEN->value, 20],
                [StoneColourNamesEnum::GRAY->value, 20],
                [StoneColourNamesEnum::BLACK->value, 20],
                [StoneColourNamesEnum::BLUE->value, 5],
                [StoneColourNamesEnum::PURPLE->value, 5],
                [StoneColourNamesEnum::PINK->value, 5],
                [StoneColourNamesEnum::RED->value, 5],
            ],
            self::DANBURITE             => [
                [StoneColourNamesEnum::YELLOW->value, 40],
                [StoneColourNamesEnum::COLOURLESS->value, 40],
                [StoneColourNamesEnum::PINK->value, 5],
                [StoneColourNamesEnum::GREEN->value, 5],
                [StoneColourNamesEnum::BROWN->value, 5],
                [StoneColourNamesEnum::LIGHT_BLUE->value, 5],
            ],
            self::DRAVITE,
            self::SARDER                => [
                [StoneColourNamesEnum::BROWN->value, 100],
            ],
            self::IOLITE                => [
                [StoneColourNamesEnum::BLUE->value, 20],
                [StoneColourNamesEnum::LIGHT_BLUE->value, 20],
                [StoneColourNamesEnum::GRAY->value, 20],
                [StoneColourNamesEnum::YELLOW->value, 20],
                [StoneColourNamesEnum::BROWN->value, 20],
            ],
            self::CASSITERITE           => [
                [StoneColourNamesEnum::BLACK->value, 15],
                [StoneColourNamesEnum::BROWN->value, 15],
                [StoneColourNamesEnum::GRAY->value, 15],
                [StoneColourNamesEnum::YELLOW->value, 15],
                [StoneColourNamesEnum::RED->value, 15],
                [StoneColourNamesEnum::GREEN->value, 15],
                [StoneColourNamesEnum::COLOURLESS->value, 10],
            ],
            self::KYANITE               => [
                [StoneColourNamesEnum::BLUE->value, 25],
                [StoneColourNamesEnum::LIGHT_BLUE->value, 25],
                [StoneColourNamesEnum::PURPLE->value, 25],
                [StoneColourNamesEnum::GREEN->value, 10],
                [StoneColourNamesEnum::YELLOW->value, 5],
                [StoneColourNamesEnum::BLACK->value, 5],
                [StoneColourNamesEnum::COLOURLESS->value, 5],
            ],
            self::CLINOHUMITE           => [
                [StoneColourNamesEnum::YELLOW->value, 25],
                [StoneColourNamesEnum::ORANGE->value, 30],
                [StoneColourNamesEnum::RED->value, 30],
                [StoneColourNamesEnum::WHITE->value, 5],
                [StoneColourNamesEnum::GREEN->value, 5],
                [StoneColourNamesEnum::COLOURLESS->value, 5],
            ],
            self::CLEIOPHANES           => [
                [StoneColourNamesEnum::YELLOW->value, 40],
                [StoneColourNamesEnum::GREEN->value, 30],
                [StoneColourNamesEnum::COLOURLESS->value, 30],
            ],
            self::CORDIERITE            => [
                [StoneColourNamesEnum::BLUE->value, 20],
                [StoneColourNamesEnum::PURPLE->value, 20],
                [StoneColourNamesEnum::YELLOW->value, 20],
                [StoneColourNamesEnum::GRAY->value, 20],
                [StoneColourNamesEnum::COLOURLESS->value, 20],
            ],
            self::CORNERUPIN            => [
                [StoneColourNamesEnum::BLUE->value, 25],
                [StoneColourNamesEnum::PURPLE->value, 15],
                [StoneColourNamesEnum::GREEN->value, 15],
                [StoneColourNamesEnum::YELLOW->value, 15],
                [StoneColourNamesEnum::BROWN->value, 15],
                [StoneColourNamesEnum::COLOURLESS->value, 15],
            ],
            self::MARMATITE,
            self::MORION,
            self::SHUNGITE,
            self::HEMATITE              => [
                [StoneColourNamesEnum::BLACK->value, 100]
            ],
            self::MOLDAVITE,
            self::TIGER_EYE,
            self::GREEN_TURQUOISE,
            self::HELIOTROPE            => [
                [StoneColourNamesEnum::GREEN->value, 100]
            ],
            self::MOTHER_PEARL          => [
                [StoneColourNamesEnum::WHITE->value, 15],
                [StoneColourNamesEnum::LIGHT_BLUE->value, 15],
                [StoneColourNamesEnum::PINK->value, 15],
                [StoneColourNamesEnum::BLACK->value, 15],
                [StoneColourNamesEnum::GRAY->value, 15],
                [StoneColourNamesEnum::GREEN->value, 15],
                [StoneColourNamesEnum::PURPLE->value, 10],
            ],
            self::PRSHIBRAMIT           => [
                [StoneColourNamesEnum::GREEN->value, 50],
                [StoneColourNamesEnum::ORANGE->value, 50],
            ],
            self::PREHNITE              => [
                [StoneColourNamesEnum::GREEN->value, 50],
                [StoneColourNamesEnum::YELLOW->value, 50],
            ],
            self::SCAPOLITE             => [
                [StoneColourNamesEnum::COLOURLESS->value, 15],
                [StoneColourNamesEnum::YELLOW->value, 15],
                [StoneColourNamesEnum::ORANGE->value, 15],
                [StoneColourNamesEnum::PINK->value, 15],
                [StoneColourNamesEnum::PURPLE->value, 15],
                [StoneColourNamesEnum::LIGHT_BLUE->value, 15],
                [StoneColourNamesEnum::GRAY->value, 10],
            ],
            self::SPHENE                => [
                [StoneColourNamesEnum::GREEN->value, 15],
                [StoneColourNamesEnum::YELLOW->value, 15],
                [StoneColourNamesEnum::BROWN->value, 15],
                [StoneColourNamesEnum::ORANGE->value, 15],
                [StoneColourNamesEnum::COLOURLESS->value, 15],
                [StoneColourNamesEnum::BLUE->value, 15],
                [StoneColourNamesEnum::BLACK->value, 5],
                [StoneColourNamesEnum::PINK->value, 5],
            ],
            self::TEKTITE               => [
                [StoneColourNamesEnum::GREEN->value, 25],
                [StoneColourNamesEnum::BLACK->value, 25],
                [StoneColourNamesEnum::BROWN->value, 25],
                [StoneColourNamesEnum::YELLOW->value, 25],
            ],
            self::SCHEELITIS            => [
                [StoneColourNamesEnum::COLOURLESS->value, 15],
                [StoneColourNamesEnum::WHITE->value, 15],
                [StoneColourNamesEnum::GRAY->value, 15],
                [StoneColourNamesEnum::YELLOW->value, 15],
                [StoneColourNamesEnum::ORANGE->value, 15],
                [StoneColourNamesEnum::GREEN->value, 15],
                [StoneColourNamesEnum::BLACK->value, 10],
            ],
            self::EUCLASE               => [
                [StoneColourNamesEnum::COLOURLESS->value, 15],
                [StoneColourNamesEnum::WHITE->value, 15],
                [StoneColourNamesEnum::GREEN->value, 15],
                [StoneColourNamesEnum::PINK->value, 15],
                [StoneColourNamesEnum::BLUE->value, 20],
                [StoneColourNamesEnum::LIGHT_BLUE->value, 20],
            ],
            self::EPIDOTE               => [
                [StoneColourNamesEnum::GREEN->value, 50],
                [StoneColourNamesEnum::RED->value, 50],
            ],
            self::AGATE                 => [
                [StoneColourNamesEnum::WHITE->value, 15],
                [StoneColourNamesEnum::GRAY->value, 15],
                [StoneColourNamesEnum::BLACK->value, 10],
                [StoneColourNamesEnum::YELLOW->value, 10],
                [StoneColourNamesEnum::ORANGE->value, 10],
                [StoneColourNamesEnum::RED->value, 10],
                [StoneColourNamesEnum::BLUE->value, 10],
                [StoneColourNamesEnum::GREEN->value, 10],
                [StoneColourNamesEnum::MULTI_COLOUR->value, 10],
            ],
            self::BLUE_TURQUOISE        => [
                [StoneColourNamesEnum::LIGHT_BLUE->value, 100]
            ],
            self::DUMORTIERITE          => [
                [StoneColourNamesEnum::BLUE->value, 25],
                [StoneColourNamesEnum::GREEN->value, 25],
                [StoneColourNamesEnum::RED->value, 25],
                [StoneColourNamesEnum::GRAY->value, 25],
            ],
            self::JADEITE               => [
                [StoneColourNamesEnum::GREEN->value, 25],
                [StoneColourNamesEnum::PURPLE->value, 25],
                [StoneColourNamesEnum::WHITE->value, 25],
                [StoneColourNamesEnum::BLACK->value, 25],
            ],
            self::MAMMOTH_BONE          => [
                [StoneColourNamesEnum::WHITE->value, 50],
                [StoneColourNamesEnum::BROWN->value, 50],
            ],
            self::NEPHRITIS             => [
                [StoneColourNamesEnum::WHITE->value, 15],
                [StoneColourNamesEnum::GREEN->value, 15],
                [StoneColourNamesEnum::LIGHT_BLUE->value, 15],
                [StoneColourNamesEnum::BLACK->value, 15],
                [StoneColourNamesEnum::YELLOW->value, 15],
                [StoneColourNamesEnum::RED->value, 10],],
            self::ONYX                  => [],
            self::RHODOCHROSITE         => [
                [StoneColourNamesEnum::BLUE->value, 100]
            ],
            self::RHODONITE             => [
                [StoneColourNamesEnum::RED->value, 50],
                [StoneColourNamesEnum::PINK->value, 50],
            ],
            self::SAPPHIRINE            => [
                [StoneColourNamesEnum::LIGHT_BLUE->value, 100],
            ],
            self::CORNELIAN             => [
                [StoneColourNamesEnum::YELLOW->value, 30],
                [StoneColourNamesEnum::RED->value, 40],
                [StoneColourNamesEnum::BROWN->value, 30],
            ],
            self::SODALITE              => [
                [StoneColourNamesEnum::BLUE->value, 15],
                [StoneColourNamesEnum::LIGHT_BLUE->value, 15],
                [StoneColourNamesEnum::WHITE->value, 15],
                [StoneColourNamesEnum::GRAY->value, 15],
                [StoneColourNamesEnum::GREEN->value, 15],
                [StoneColourNamesEnum::RED->value, 15],
                [StoneColourNamesEnum::PINK->value, 10],
            ],
            self::SUGILITE              => [
                [StoneColourNamesEnum::PURPLE->value, 25],
                [StoneColourNamesEnum::PINK->value, 25],
                [StoneColourNamesEnum::YELLOW->value, 25],
                [StoneColourNamesEnum::MULTI_COLOUR->value, 25],
            ],
            self::CHRYSOPRASE           => [
                [StoneColourNamesEnum::GREEN->value, 90],
                [StoneColourNamesEnum::MULTI_COLOUR->value, 10],
            ],
            self::CHRYSOKOLLA           => [
                [StoneColourNamesEnum::BLUE->value, 15],
                [StoneColourNamesEnum::LIGHT_BLUE->value, 15],
                [StoneColourNamesEnum::BROWN->value, 15],
                [StoneColourNamesEnum::GREEN->value, 25],
                [StoneColourNamesEnum::BLACK->value, 15],
                [StoneColourNamesEnum::MULTI_COLOUR->value, 15],
            ],
            self::CHAROITE,
            self::SAPPHIRE_PURPLE       => [
                [StoneColourNamesEnum::PURPLE->value, 100]
            ],
            self::EUDIALYTE             => [],
            self::AMBER                 => [
                [StoneColourNamesEnum::COLOURLESS->value, 70],
                [StoneColourNamesEnum::YELLOW->value, 5],
                [StoneColourNamesEnum::ORANGE->value, 5],
                [StoneColourNamesEnum::RED->value, 5],
                [StoneColourNamesEnum::GREEN->value, 5],
                [StoneColourNamesEnum::WHITE->value, 5],
                [StoneColourNamesEnum::LIGHT_BLUE->value, 5],
            ],
            self::AVENTURINE            => [],
            self::ADULARIA              => [],
            self::ACTINOLITE            => [],
            self::AMAZONITE             => [],
            self::ASTROFYLITIS          => [],
            self::BELOMORITE            => [],
            self::RHINESTONE,
            self::RUTILATED_QUARTZ      => [
                [StoneColourNamesEnum::COLOURLESS->value, 100]
            ],
            self::JADE                  => [],
            self::LABRADORITE           => [
                [StoneColourNamesEnum::BLACK->value, 50],
                [StoneColourNamesEnum::BROWN->value, 50],
                [StoneColourNamesEnum::GRAY->value, 50]
            ],
            self::LARIMAR               => [],
            self::OBSIDIAN_IRIDESCENT   => [],
            self::OPAL                  => [],
            self::PETALITE              => [],
            self::RHODUSITE             => [],
            self::CIMBIRCITE            => [],
            self::SUNSTONE              => [],
            self::SPECTROLITE           => [],
            self::STAUROLITE            => [],
            self::TUGTUPITE             => [],
            self::ELEOLITHIC            => [],
            self::JASPER_SMALL_DRAWN    => [],
            self::JASPER_LANDSCAPE      => [],
            self::AGALMATALITE          => [],
            self::BRECCIA               => [],
            self::GAGAT                 => [],
            self::WRITING_GRANITE       => [],
            self::GOLDITE               => [],
            self::CACHOLONG             => [],
            self::QUARTZITE             => [],
            self::SERAPHINITIS          => [],
            self::CONGLOMERATE          => [],
            self::PATTERNED_FLINT       => [],
            self::OBSIDIAN              => [],
            self::PETRIFIED_WOOD        => [],
            self::MARBLED_ONYX          => [],
            self::OPHIOCALCITE          => [],
            self::ORNAMENTAL_PORPHYRIES => [],
            self::SELENITE              => [],
            self::SERPENTINITE          => [],
            self::SKARN                 => [],
            self::SOAPSTONE             => [],
            self::THUILITE              => [],
            self::FLUORITE              => [],
            self::MONOCHROMATIC_JASPER  => [],
            self::BANDED_JASPER         => [],
            self::TOURMALINE            => [
                [StoneColourNamesEnum::COLOURLESS->value, 10],
                [StoneColourNamesEnum::BLUE->value, 20],
                [StoneColourNamesEnum::YELLOW->value, 20],
                [StoneColourNamesEnum::RED->value, 20],
                [StoneColourNamesEnum::PINK->value, 10],
                [StoneColourNamesEnum::GREEN->value, 5],
            ],
            self::ROSE_QUARTZ           => [
                [StoneColourNamesEnum::PINK->value, 100]
            ],
            self::SMOKEY_QUARTZ         => [
                [StoneColourNamesEnum::GRAY->value, 50],
                [StoneColourNamesEnum::BROWN->value, 50],
            ],
            self::SNOW_QUARTZ           => [
                [StoneColourNamesEnum::COLOURLESS->value, 50],
                [StoneColourNamesEnum::WHITE->value, 50],
            ],
            self::SAPPHIRE_YELLOW       => [
                [StoneColourNamesEnum::YELLOW->value, 100]
            ],
            self::GROSSULAR             => [
                [StoneColourNamesEnum::YELLOW->value, 50],
                [StoneColourNamesEnum::GREEN->value, 50]
            ],
            self::RHODOLITE             => [
                [StoneColourNamesEnum::RED->value, 50],
                [StoneColourNamesEnum::PINK->value, 50]
            ],
        };
    }

    public function stoneOrigin(): array
    {

    }

    public function stoneForms(): array
    {
        return match ($this) {
            self::DIAMOND               => [
                [StoneCutFormNamesEnum::ROUND_CUT->value, 50],
                [StoneCutFormNamesEnum::PRINCESS_CUT->value, 5],
                [StoneCutFormNamesEnum::PEAR_CUT->value, 5],
                [StoneCutFormNamesEnum::MARQUISE_CUT->value, 5],
                [StoneCutFormNamesEnum::OVAL_CUT->value, 5],
                [StoneCutFormNamesEnum::EMERALD_CUT->value, 5],
                [StoneCutFormNamesEnum::HEART_CUT->value, 5],
                [StoneCutFormNamesEnum::CUSHION_CUT->value, 5],
                [StoneCutFormNamesEnum::RADIANT_CUT->value, 5],
                [StoneCutFormNamesEnum::BAGUETTE_CUT->value, 5],
                [StoneCutFormNamesEnum::TRILLION_CUT->value, 5],
                [StoneCutFormNamesEnum::ASSCHER_CUT->value, 5],
            ],
            self::ALEXANDRITE           => [
                [StoneCutFormNamesEnum::OVAL_CUT->value, 25],
                [StoneCutFormNamesEnum::ROUND_CUT->value, 25],
                [StoneCutFormNamesEnum::PEAR_CUT->value, 25],
                [StoneCutFormNamesEnum::BAGUETTE_CUT->value, 25]
            ],
            self::NATURAL_SEA_PEARL,
            self::NATURAL_RIVER_PEARLS,
            self::CULTURED_SEA_PEARLS,
            self::CULTURED_RIVER_PEARLS,
            self::STAR_RUBY,
            self::STAR_SAPPHIRE,
            self::STAR_DIOPSIDE,
            self::RUTILATED_QUARTZ,
            self::MOTHER_PEARL,
            self::BLUE_TURQUOISE,
            self::GREEN_TURQUOISE,
            self::RHODONITE,
            self::CORAL,
            self::NEPHRITIS,
            self::SHUNGITE,
            self::ROSE_QUARTZ,
            self::SNOW_QUARTZ,
            self::TIGER_EYE,
            self::AGATE,
            self::UVAROVITE,
            self::LABRADORITE,
            self::HEMATITE,
            self::AMETHYST              => [
                [StoneCabochonFormNamesEnum::OVAL_CABOCHON->value, 50],
                [StoneCabochonFormNamesEnum::ROUND_CABOCHON->value, 50]
            ],
            self::EMERALD               => [
                [StoneCutFormNamesEnum::EMERALD_CUT->value, 50],
                [StoneCutFormNamesEnum::BAGUETTE_CUT->value, 50],
                [StoneCutFormNamesEnum::OVAL_CUT->value, 50],
                [StoneCutFormNamesEnum::PEAR_CUT->value, 50],
                [StoneCutFormNamesEnum::CUSHION_CUT->value, 50]
            ],
            self::RUBY                  => [
                [StoneCabochonFormNamesEnum::OVAL_CABOCHON->value, 5],
                [StoneCabochonFormNamesEnum::ROUND_CABOCHON->value, 5],
                [StoneCutFormNamesEnum::OVAL_CUT->value, 15],
                [StoneCutFormNamesEnum::ROUND_CUT->value, 15],
                [StoneCutFormNamesEnum::PEAR_CUT->value, 15],
                [StoneCutFormNamesEnum::EMERALD_CUT->value, 15],
                [StoneCutFormNamesEnum::CUSHION_CUT->value, 15],
                [StoneCutFormNamesEnum::MARQUISE_CUT->value, 15]
            ],
            self::SAPPHIRE,
            self::SAPPHIRE_PINK         => [
                [StoneCutFormNamesEnum::ROUND_CUT->value, 15],
                [StoneCutFormNamesEnum::OVAL_CUT->value, 15],
                [StoneCutFormNamesEnum::PEAR_CUT->value, 15],
                [StoneCutFormNamesEnum::EMERALD_CUT->value, 20],
                [StoneCutFormNamesEnum::MARQUISE_CUT->value, 20],
                [StoneCutFormNamesEnum::HEART_CUT->value, 15],
            ],
            self::DEMANTOID             => [
                [StoneCutFormNamesEnum::ROUND_CUT->value, 15],
                [StoneCutFormNamesEnum::OVAL_CUT->value, 15],
                [StoneCutFormNamesEnum::EMERALD_CUT->value, 15],
                [StoneCutFormNamesEnum::CUSHION_CUT->value, 15],
                [StoneCutFormNamesEnum::PEAR_CUT->value, 15],
                [StoneCutFormNamesEnum::BAGUETTE_CUT->value, 20],
                [StoneCutFormNamesEnum::PRINCESS_CUT->value, 20],
        ],
            self::BLACK_OPAL            => [],
            self::PADPARADSCHA          => [],
            self::TANZANITE             => [],
            self::PARAIBA_TOURMALINE,
            self::TOURMALINE            => [
                [StoneCutFormNamesEnum::EMERALD_CUT->value, 25],
                [StoneCutFormNamesEnum::PEAR_CUT->value, 25],
                [StoneCabochonFormNamesEnum::OVAL_CABOCHON->value, 25],
                [StoneCabochonFormNamesEnum::ROUND_CABOCHON->value, 25],
            ],
            self::TSAVORITE             => [],
            self::RED_NOBLE_SPINEL      => [],
            self::AQUAMARINE            => [],
            self::AMETRINE              => [],
            self::BIXBIT                => [],
            self::MORGANITE             => [],
            self::HYACINTH              => [],
            self::HIDDEN                => [],
            self::KUNZITE               => [],
            self::MAXIS                 => [],
            self::MALAYA                => [],
            self::WHITE_NOBLE_OPAL      => [],
            self::NOBLE_FIRE_OPAL       => [],
            self::RUBELLITE             => [],
            self::SAPPHIRE_GREEN        => [
                [StoneCutFormNamesEnum::ROUND_CUT->value, 15],
                [StoneCutFormNamesEnum::OVAL_CUT->value, 15],
                [StoneCutFormNamesEnum::EMERALD_CUT->value, 15],
                [StoneCutFormNamesEnum::CUSHION_CUT->value, 15],
                [StoneCutFormNamesEnum::PEAR_CUT->value, 15],
                [StoneCutFormNamesEnum::MARQUISE_CUT->value, 15],
                [StoneCutFormNamesEnum::PRINCESS_CUT->value, 10],
            ],
            self::TOPAZOLITE            => [
                [StoneCutFormNamesEnum::ROUND_CUT->value, 50],
                [StoneCutFormNamesEnum::EMERALD_CUT->value, 50]
            ],
            self::TOPAZ_IMPERIAL        => [],
            self::POLYCHROME_TOURMALINE => [],
            self::PHENACITE             => [],
            self::BLUE_SPINEL           => [],
            self::PURPLE_SPINEL         => [],
            self::PINK_SPINEL           => [],
            self::ALMANDINE,
            self::SPESSARTINE           => [
                [StoneCabochonFormNamesEnum::OVAL_CABOCHON->value, 15],
                [StoneCabochonFormNamesEnum::ROUND_CABOCHON->value, 10],
                [StoneCutFormNamesEnum::OVAL_CUT->value, 15],
                [StoneCutFormNamesEnum::ROUND_CUT->value, 15],
                [StoneCutFormNamesEnum::PEAR_CUT->value, 15],
                [StoneCutFormNamesEnum::EMERALD_CUT->value, 15],
                [StoneCutFormNamesEnum::CUSHION_CUT->value, 15]
            ],
            self::VERDELITE             => [],
            self::HELIODOR              => [],
            self::GOSHENITE             => [],
            self::INDIGOLITE            => [],
            self::LEUCO_SAPPHIRE        => [],
            self::PYROPE                => [
                [StoneCabochonFormNamesEnum::OVAL_CABOCHON->value, 5],
                [StoneCabochonFormNamesEnum::ROUND_CABOCHON->value, 5],
                [StoneCutFormNamesEnum::OVAL_CUT->value, 15],
                [StoneCutFormNamesEnum::ROUND_CUT->value, 15],
                [StoneCutFormNamesEnum::PEAR_CUT->value, 15],
                [StoneCutFormNamesEnum::EMERALD_CUT->value, 15],
                [StoneCutFormNamesEnum::CUSHION_CUT->value, 10],
                [StoneCutFormNamesEnum::MARQUISE_CUT->value, 10],
                [StoneCutFormNamesEnum::BAGUETTE_CUT->value, 10]
            ],
            self::PRASIOLITE            => [],
            self::PINK_TOPAZ            => [],
            self::BLUE_TOPAZ            => [],
            self::YELLOW_TOPAZ          => [],
            self::COLOURLESS_TOPAZ      => [],
            self::CHRYSOLITE            => [],
            self::CYMOPHANE             => [],
            self::CITRINE               => [],
            self::AXINITE               => [],
            self::ANDALUSITE            => [],
            self::APATITE               => [],
            self::ANDRADITE             => [
                [StoneCabochonFormNamesEnum::OVAL_CABOCHON->value, 5],
                [StoneCabochonFormNamesEnum::ROUND_CABOCHON->value, 5],
                [StoneCutFormNamesEnum::OVAL_CUT->value, 15],
                [StoneCutFormNamesEnum::ROUND_CUT->value, 15],
                [StoneCutFormNamesEnum::PEAR_CUT->value, 15],
                [StoneCutFormNamesEnum::EMERALD_CUT->value, 15],
                [StoneCutFormNamesEnum::CUSHION_CUT->value, 10]
            ],
            self::ACHROITE              => [],
            self::BRAZILIANITE          => [],
            self::VESUVIAN              => [],
            self::DANBURITE             => [],
            self::DRAVITE               => [],
            self::IOLITE                => [],
            self::CASSITERITE           => [],
            self::KYANITE               => [],
            self::CLINOHUMITE           => [],
            self::CLEIOPHANES           => [],
            self::CORDIERITE            => [],
            self::CORNERUPIN            => [],
            self::MARMATITE             => [],
            self::MOLDAVITE             => [],
            self::MORION                => [],
            self::PRSHIBRAMIT           => [],
            self::PREHNITE              => [],
            self::SCAPOLITE             => [],
            self::HAWKEYE               => [],
            self::SPHENE                => [],
            self::TEKTITE               => [],
            self::CHROME_DIOPSID        => [],
            self::SCHEELITIS            => [],
            self::EUCLASE               => [],
            self::EPIDOTE               => [],
            self::AZURITE               => [],
            self::ANYOLITE              => [],
            self::HELIOTROPE            => [],
            self::DUMORTIERITE          => [],
            self::JADEITE               => [],
            self::CARNELIAN             => [],
            self::LAZURITE              => [
                [StoneCabochonFormNamesEnum::OVAL_CABOCHON->value, 40],
                [StoneCabochonFormNamesEnum::ROUND_CABOCHON->value, 40],
                [StoneCutFormNamesEnum::BAGUETTE_CUT->value, 20]
            ],
            self::MALACHITE             => [],
            self::MAMMOTH_BONE          => [],
            self::ONYX                  => [],
            self::RHODOCHROSITE         => [],
            self::SARDER                => [],
            self::SAPPHIRINE            => [],
            self::CORNELIAN             => [],
            self::IVORY                 => [],
            self::SODALITE              => [],
            self::SUGILITE              => [],
            self::CHRYSOPRASE           => [],
            self::CHRYSOKOLLA           => [],
            self::CHAROITE              => [],
            self::EUDIALYTE             => [],
            self::AMBER                 => [
                [StoneCabochonFormNamesEnum::OVAL_CABOCHON->value, 35],
                [StoneCabochonFormNamesEnum::ROUND_CABOCHON->value, 35],
                [StoneCutFormNamesEnum::MARQUISE_CUT->value, 5],
                [StoneCutFormNamesEnum::OVAL_CUT->value, 5],
                [StoneCutFormNamesEnum::ROUND_CUT->value, 5],
                [StoneCutFormNamesEnum::PEAR_CUT->value, 5],
                [StoneCutFormNamesEnum::HEART_CUT->value, 5],
                [StoneCutFormNamesEnum::EMERALD_CUT->value, 5],
            ],
            self::AVENTURINE            => [],
            self::ADULARIA              => [],
            self::ACTINOLITE            => [],
            self::AMAZONITE             => [],
            self::ASTROFYLITIS          => [],
            self::BELOMORITE            => [],
            self::RHINESTONE            => [
                [StoneCabochonFormNamesEnum::OVAL_CABOCHON->value, 20],
                [StoneCabochonFormNamesEnum::ROUND_CABOCHON->value, 20],
                [StoneCutFormNamesEnum::MARQUISE_CUT->value, 15],
                [StoneCutFormNamesEnum::NATURAL->value, 15],
                [StoneCutFormNamesEnum::PEAR_CUT->value, 15],
                [StoneCutFormNamesEnum::HEART_CUT->value, 15],
            ],
            self::JADE                  => [],
            self::LARIMAR               => [],
            self::OBSIDIAN_IRIDESCENT   => [],
            self::OPAL                  => [],
            self::PETALITE              => [],
            self::RHODUSITE             => [],
            self::CIMBIRCITE            => [],
            self::SMOKEY_QUARTZ         => [
                [StoneCabochonFormNamesEnum::OVAL_CABOCHON->value, 15],
                [StoneCabochonFormNamesEnum::ROUND_CABOCHON->value, 15],
                [StoneCutFormNamesEnum::EMERALD_CUT->value, 15],
                [StoneCutFormNamesEnum::ROUND_CUT->value, 15],
                [StoneCutFormNamesEnum::OVAL_CUT->value, 15],
                [StoneCutFormNamesEnum::PEAR_CUT->value, 15],
                [StoneCutFormNamesEnum::MARQUISE_CUT->value, 10],
            ],
            self::SUNSTONE              => [],
            self::SPECTROLITE           => [],
            self::STAUROLITE            => [],
            self::TUGTUPITE             => [],
            self::ELEOLITHIC            => [],
            self::JASPER_SMALL_DRAWN    => [],
            self::JASPER_LANDSCAPE      => [],
            self::AGALMATALITE          => [],
            self::BRECCIA               => [],
            self::GAGAT                 => [],
            self::WRITING_GRANITE       => [],
            self::GOLDITE               => [],
            self::CACHOLONG             => [],
            self::QUARTZITE             => [],
            self::SERAPHINITIS          => [],
            self::CONGLOMERATE          => [],
            self::PATTERNED_FLINT       => [],
            self::OBSIDIAN              => [],
            self::PETRIFIED_WOOD        => [],
            self::MARBLED_ONYX          => [],
            self::OPHIOCALCITE          => [],
            self::ORNAMENTAL_PORPHYRIES => [],
            self::SELENITE              => [],
            self::SERPENTINITE          => [],
            self::SKARN                 => [],
            self::SOAPSTONE             => [],
            self::THUILITE              => [],
            self::FLUORITE              => [],
            self::MONOCHROMATIC_JASPER  => [],
            self::BANDED_JASPER         => [],
            self::SAPPHIRE_YELLOW,
            self::SAPPHIRE_PURPLE       => [
                [StoneCutFormNamesEnum::ROUND_CUT->value, 5],
                [StoneCutFormNamesEnum::OVAL_CUT->value, 5],
                [StoneCutFormNamesEnum::PEAR_CUT->value, 5],
                [StoneCutFormNamesEnum::EMERALD_CUT->value, 5],
                [StoneCutFormNamesEnum::MARQUISE_CUT->value, 5],
                [StoneCabochonFormNamesEnum::OVAL_CABOCHON->value, 50],
                [StoneCabochonFormNamesEnum::ROUND_CABOCHON->value, 25]
            ],
            self::GROSSULAR             => [
                [StoneCutFormNamesEnum::ROUND_CUT->value, 20],
                [StoneCutFormNamesEnum::OVAL_CUT->value, 20],
                [StoneCutFormNamesEnum::PEAR_CUT->value, 10],
                [StoneCutFormNamesEnum::EMERALD_CUT->value, 10],
                [StoneCutFormNamesEnum::PRINCESS_CUT->value, 10],
                [StoneCutFormNamesEnum::RADIANT_CUT->value, 10],
                [StoneCabochonFormNamesEnum::OVAL_CABOCHON->value, 10],
                [StoneCabochonFormNamesEnum::ROUND_CABOCHON->value, 10]
            ],
            self::RHODOLITE             => [
                [StoneCutFormNamesEnum::ROUND_CUT->value, 20],
                [StoneCutFormNamesEnum::OVAL_CUT->value, 20],
                [StoneCutFormNamesEnum::PEAR_CUT->value, 10],
                [StoneCutFormNamesEnum::EMERALD_CUT->value, 10],
                [StoneCutFormNamesEnum::CUSHION_CUT->value, 10],
                [StoneCutFormNamesEnum::MARQUISE_CUT->value, 10],
                [StoneCabochonFormNamesEnum::OVAL_CABOCHON->value, 10],
                [StoneCabochonFormNamesEnum::ROUND_CABOCHON->value, 10]
            ],
        };
    }
}
