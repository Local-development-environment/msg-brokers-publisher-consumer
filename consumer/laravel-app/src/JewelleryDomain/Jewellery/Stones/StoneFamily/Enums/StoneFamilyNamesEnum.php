<?php

namespace JewelleryDomain\Jewellery\Stones\StoneFamily\Enums;

use JewelleryDomain\Jewellery\Stones\Stone\Enums\StoneNamesEnum;

enum StoneFamilyNamesEnum: string
{
    case DIAMOND      = 'алмаз';
    case CORUNDUM     = 'корунд';
    case BERYL        = 'берилл';
    case SPINEL       = 'шпинель';
    case APATITE      = 'апатит';
    case QUARTZ       = 'кварц';
    case CHRYSOBERYL  = 'хризоберилл';
    case DIOPSIDE     = 'диопсид';
    case FELDSPAR     = 'полевой шпат';
    case FLUORIDE     = 'флюорид';
    case POMEGRANATE  = 'гранат';
    case TEKTITE      = 'тектит';
    case HEMATITE     = 'гематит';
    case IOLITE       = 'иолит';
    case JADE         = 'жад';
    case KYANITE      = 'кианит';
    case LAPIS_LAZULI = 'лазурит';
    case MALACHITE    = 'малахит';
    case OPAL         = 'опал';
    case OLIVIN       = 'оливин';
    case PREHNITE     = 'пренит';
    case SCAPOLITE    = 'скаполайт';
    case SPHENE       = 'сфен';
    case SPODUMENE    = 'сподумен';
    case TOPAZ        = 'топаз';
    case TOURMALINE   = 'турмалин';
    case TUGTUPITE    = 'тугтупит';
    case TURQUOISE    = 'бирюза';
    case ZIRCON       = 'циркон';
    case ZOISITE      = 'цоизит';
//    case SILICATE    = 'силикат';
//    case CARBONATE   = 'карбонат';
    case ORGANOGENIC = 'органоген';
//    case COAL        = 'каменный уголь';
//    case PHOSPHATE   = 'фосфат';
//    case PYROXENE    = 'пироксен';
//    case RUTILE      = 'рутил';

    public function description(): string
    {
        return match ($this) {
            self::CHRYSOBERYL  => 'Хризоберилл драгоценный минерал, самый известный камень этой группы Александрит',
            self::DIAMOND      => 'Алмаз — это необработанный бриллиант, наиболее твердый из минералов и дорогой среди драгоценных камней.',
            self::BERYL        => 'Берилл это группа из драгоценных и ювелирных минералов, включающая такие камни как Аквамарин, Изумруд, Морганит',
//            self::SILICATE    => 'Силикаты — это минералы, образованные солями кремниевых кислот, которые составляют основу земной коры и горных пород.',
            self::FELDSPAR     => 'Группа ювелирных камней полевой шпат включают в себя такие минералы как Амазонит, Лабрадорит, Лунный камень. ',
            self::QUARTZ       => 'Кварц является вторым наиболее распространенным минералом на земле после полевого шпата, группа включает Агат, Аметист, Авантюрин, Сердолик, Оникс и другие',
//            self::CARBONATE   => 'К ювелирным минералам-карбонатам относятся такие камни, как бирюза, малахит и лазурит. Эти минералы ценимы за их цвет и узорчатость.',
            self::ORGANOGENIC  => 'Органогенный минерал — это минерал, который образуется в результате жизнедеятельности организмов.',
            self::CORUNDUM     => 'Прозрачные, ювелирно-качественные корунды (рубины и сапфиры) используются как драгоценные камни.',
//            self::COAL        => 'Каменный уголь — это твердое горючее полезное ископаемое, которое образуется из остатков древних растений под воздействием высоких температур и давления на протяжении миллионов лет.',
            self::POMEGRANATE  => 'Гранат — общее название группы сложных силикатных минералов с изометрической кристаллической структурой и схожими свойствами и химическим составом.',
            self::TOURMALINE   => 'Турмалины — это группа минералов (боросодержащих алюмосиликатов), известная своим разнообразием цветов, от черного и зеленого до красного, синего, розового и бесцветного.',
//            self::PHOSPHATE   => 'Фосфаты, редко используются в ювелирной промышленности. Эти минералы не обладают такой же твердостью, как минералы других групп ювелирных минералов.',
            self::SPINEL       => 'Шпинель - это минерал, оксид магния и алюминия очень разного Цвета - желтого, оранжевого, красного, фиолето вого, синего, голубого, зеленого, черного',
//            self::PYROXENE    => 'Это обширная группа минералов, главным образом, породообразующих силикатов с похожими свойствами, встречающихся в магматических, метаморфических и скарновых образованиях.',
            self::SPODUMENE    => 'Минерал, силикат лития и алюминия.',
            self::ZIRCON       => 'Циркон (Zirkon, от персидского «zargun» - «золотой цвет») – минерал с сильным алмазным блеском.',
            self::APATITE      => 'В качестве ювелирного сырья используют небольшие прозрачные кристаллы. Апатиты ювелирного качества обладают стеклянным блеском и могут быть бледно-зеленого, желтого, голубого, коричневого, розового, фиолетового цвета, в зависимости от различных примесей',
            self::DIOPSIDE     => 'Диопсид — распространенный минерал-силикат из группы пироксенов. В ювелирном деле ценятся его зеленые разновидности (хромдиопсид, «сибирский изумруд») и камни с эффектом «кошачьего глаза».',
            self::FLUORIDE     => 'Флюорит сине-зеленого окраса считается самым распространенным в природе. Достаточно редко находят абсолютно прозрачные кристаллы без каких-либо примесей и экземпляры розово-красных оттенков. ',
            self::TEKTITE      => 'Тектит – полупрозрачные и непрозрачные темные камни, внешне похожие на обсидианы, но со своей уникальной теорией происхождения, имеющей множество спорных гипотез. ',
            self::HEMATITE     => 'Гематит (Hematite) – это минеральная форма железа. Это непрозрачный хрупкий минерал, твердость которого не превышает 6,5  баллов по шкале Мооса.',
            self::IOLITE       => 'Иолит («фиалковый камень», «водяной сапфир») — это прозрачная ювелирная разновидность минерала кордиерита, ценимая за насыщенный сине-фиолетовый цвет и выраженный плеохроизм',
            self::JADE         => 'Жад — общее название минералов жадеита и нефрита.',
            self::KYANITE      => 'Кианит (дистен) — это природный силикат алюминия, характеризующийся пластинчатыми кристаллами, стеклянным блеском и высокой твердостью (до 7 по шкале Мооса в поперечном направлении). Обычно имеет синий, голубой, фиолетовый или черный оттенок. ',
            self::LAPIS_LAZULI => 'Ляпис-лазурь (лазурит, ляпис-лазурит) — непрозрачный ювелирно-поделочный камень синего цвета (от голубого до фиолетового)',
            self::MALACHITE    => 'Малахит (англ. malachite) – это карбонат меди с гидроксилом. Один из красивейших минералов с богатой палитрой зеленых оттенков от изумрудного до бирюзового.',
            self::OPAL         => 'Опал — это гидрат двуокиси кремния, содержащий от 6 до 10% воды',
            self::OLIVIN       => 'Оливин — распространенный породообразующий минерал. Имеет оливково-зеленый, желто-зеленый цвет, стеклянный блеск и твердость 6,5–7 по шкале Мооса. Прозрачные ювелирные разновидности известны как перидот или хризолит.',
            self::PREHNITE     => 'Пренит — это алюмосиликат кальция, красивый полудрагоценный поделочный камень, известный своими нежно-зелеными, желтовато-зелеными и яблочными оттенками.',
            self::SCAPOLITE    => 'Скаполит имеет разную по цвету и интенсивности окраску: от желтого до фиолетового, розового, голубого, зеленого, оранжевого. Встречается в виде вытянутых призматических кристаллов',
            self::SPHENE       => 'Камни минерала сфен ювелирного качества встречаются редко, а по игре света могут сравниться с бриллиантами.',
            self::TOPAZ        => 'Топазы (Topaz) представляют собой фторсодержащие силикаты алюминия. Это красивый полудрагоценный камень. Наиболее часто встречающиеся оттенки кристаллов топаза – вишневые, желтые, розовые, золотистые. «Кошачий глаз» и полихромность камней также достаточно распространены.',
            self::TUGTUPITE    => 'Тугтупит - редкий флюоресцентный минерал с эффектом тенебресценции - обычно от розоватого до малинового цвета',
            self::TURQUOISE    => 'Бирюза (Turquoise) представляет собой соединение водного фосфата меди с алюминием. Оттенки бирюзы варьируются от небесно-голубого до серо-зеленого цвета. Больше всего ценится голубой минерал. ',
            self::ZOISITE      => 'Цоизит — это распространенный природный минерал, силикат кальция и алюминия из группы эпидота, известный разнообразием цветов (зеленый, розовый, синий) и высоким содержанием примесей.',
//            self::RUTILE      => 'Рути́л (от лат. rutilus — изжелта-красный, золотисто-красный) — минерал класса оксидов, наиболее распространённая полиморфная модификация диоксида титана',
        };
    }

    public function stones(): array
    {
        return match ($this) {
            self::CHRYSOBERYL  => [
                StoneNamesEnum::ALEXANDRITE->value,
                StoneNamesEnum::CYMOPHANE->value,
                StoneNamesEnum::ALEXANDRITE->value,
            ],
            self::DIAMOND      => [
                StoneNamesEnum::DIAMOND->value
            ],
            self::BERYL        => [
                StoneNamesEnum::AQUAMARINE->value,
                StoneNamesEnum::BIXBIT->value,
                StoneNamesEnum::EMERALD->value,
                StoneNamesEnum::GOSHENITE->value,
                StoneNamesEnum::HELIODOR->value,
                StoneNamesEnum::MORGANITE->value,
            ],
//            self::SILICATE    => [],
            self::FELDSPAR     => [
                StoneNamesEnum::ADULARIA->value,
                StoneNamesEnum::SUNSTONE->value,
                StoneNamesEnum::AMAZONITE->value,
                StoneNamesEnum::LABRADORITE->value,
            ],
            self::QUARTZ       => [
                StoneNamesEnum::AGATE->value,
                StoneNamesEnum::HELIOTROPE->value,
                StoneNamesEnum::CORNELIAN->value,
                StoneNamesEnum::CORNELIAN->value,
                StoneNamesEnum::CHRYSOPRASE->value,
                StoneNamesEnum::JASPER_LANDSCAPE->value,
                StoneNamesEnum::JASPER_SMALL_DRAWN->value,
                StoneNamesEnum::ONYX->value,
                StoneNamesEnum::MARBLED_ONYX->value,
                StoneNamesEnum::AMETHYST->value,
                StoneNamesEnum::SMOKEY_QUARTZ->value,
                StoneNamesEnum::MORION->value,
                StoneNamesEnum::CITRINE->value,
                StoneNamesEnum::HAWKEYE->value,
                StoneNamesEnum::SNOW_QUARTZ->value,
                StoneNamesEnum::RHINESTONE->value,
                StoneNamesEnum::ROSE_QUARTZ->value,
                StoneNamesEnum::RUTILATED_QUARTZ->value,
                StoneNamesEnum::AMETRINE->value,
                StoneNamesEnum::AVENTURINE->value,
                StoneNamesEnum::TIGER_EYE->value,
                StoneNamesEnum::CHRYSOKOLLA->value,
                StoneNamesEnum::DUMORTIERITE->value,
            ],
//            self::CARBONATE   => [],
            self::ORGANOGENIC  => [
                StoneNamesEnum::CORAL->value,
                StoneNamesEnum::NATURAL_SEA_PEARL->value,
                StoneNamesEnum::CULTURED_SEA_PEARL->value,
                StoneNamesEnum::NATURAL_RIVER_PEARL->value,
                StoneNamesEnum::CULTURED_RIVER_PEARL->value,
            ],
            self::CORUNDUM     => [
                StoneNamesEnum::PADPARADSCHA->value,
                StoneNamesEnum::RUBY->value,
                StoneNamesEnum::SAPPHIRE->value,
                StoneNamesEnum::STAR_RUBY->value,
                StoneNamesEnum::STAR_SAPPHIRE->value
            ],
//            self::COAL        => [],
            self::POMEGRANATE  => [
                StoneNamesEnum::PYROPE->value,
                StoneNamesEnum::RHODOLITE->value,
                StoneNamesEnum::ALMANDINE->value,
                StoneNamesEnum::MALAYA->value,
                StoneNamesEnum::SPESSARTINE->value,
                StoneNamesEnum::UVAROVITE->value,
                StoneNamesEnum::GROSSULAR->value,
                StoneNamesEnum::TSAVORITE->value,
                StoneNamesEnum::ANDRADITE->value,
                StoneNamesEnum::DEMANTOID->value,
                StoneNamesEnum::TOPAZOLITE->value,
            ],
            self::TOURMALINE   => [
                StoneNamesEnum::ACHROITE->value,
                StoneNamesEnum::INDIGOLITE->value,
                StoneNamesEnum::PARAIBA_TOURMALINE->value,
                StoneNamesEnum::RUBELLITE->value,
                StoneNamesEnum::VERDELITE->value,
                StoneNamesEnum::DRAVITE->value,
            ],
//            self::PHOSPHATE   => [],
            self::SPINEL       => [
                StoneNamesEnum::PINK_SPINEL->value,
                StoneNamesEnum::PURPLE_SPINEL->value,
                StoneNamesEnum::BLUE_SPINEL->value,
                StoneNamesEnum::RED_NOBLE_SPINEL->value,
            ],
//            self::PYROXENE    => [],
            self::SPODUMENE    => [
                StoneNamesEnum::KUNZITE->value,
                StoneNamesEnum::HIDDEN->value
            ],
            self::ZIRCON       => [],
            self::APATITE      => [],
            self::DIOPSIDE     => [],
            self::FLUORIDE     => [],
            self::TEKTITE      => [],
            self::HEMATITE     => [],
            self::IOLITE       => [],
            self::JADE         => [
                StoneNamesEnum::JADEITE->value,
                StoneNamesEnum::NEPHRITIS->value,
            ],
            self::KYANITE      => [],
            self::LAPIS_LAZULI => [],
            self::MALACHITE    => [],
            self::OPAL         => [],
            self::OLIVIN       => [],
            self::PREHNITE     => [],
            self::SCAPOLITE    => [],
            self::SPHENE       => [],
            self::TOPAZ        => [],
            self::TUGTUPITE    => [],
            self::TURQUOISE    => [],
            self::ZOISITE      => [],
//            self::RUTILE      => [],
        };
    }
}
