<?php

namespace JewelleryDomain\Jewellery\Stones\JwlyGrade\Enums;

use JewelleryDomain\Jewellery\Stones\Stone\Enums\StoneNamesEnum;
use JewelleryDomain\Jewellery\Stones\StoneGroup\Enums\StoneGroupNamesEnum;

enum JwlyGradeNamesEnum: string
{
    case FIRST_JWLY_GRADE = 'ювелирный камень первого порядка';
    case SECOND_JWLY_GRADE = 'ювелирный камень второго порядка';
    case THIRD_JWLY_GRADE = 'ювелирный камень третьего порядка';
    case FOURTH_JWLY_GRADE = 'ювелирный камень четвертого порядка';

    public function description(): string
    {
        return match ($this) {
            self::FIRST_JWLY_GRADE  => 'для обозначения ювелирных камней первого порядка',
            self::SECOND_JWLY_GRADE => 'для обозначения ювелирных камней второго порядка',
            self::THIRD_JWLY_GRADE  => 'для обозначения ювелирных камней третьего порядка',
            self::FOURTH_JWLY_GRADE => 'для обозначения ювелирных камней четвертого порядка',
        };
    }

    public function groups(): string
    {
        return match ($this) {
            self::FIRST_JWLY_GRADE,
            self::SECOND_JWLY_GRADE,
            self::THIRD_JWLY_GRADE,
            self::FOURTH_JWLY_GRADE => StoneGroupNamesEnum::JEWELLERIES->value,
        };
    }

    public function jewelleryStones(): array
    {
        return match ($this) {
            self::FIRST_JWLY_GRADE  => [
                StoneNamesEnum::DEMANTOID->value,
                StoneNamesEnum::BLACK_OPAL->value,
                StoneNamesEnum::PADPARADSCHA->value,
                StoneNamesEnum::SAPPHIRE_PINK->value,
                StoneNamesEnum::TANZANITE->value,
                StoneNamesEnum::PARAIBA_TOURMALINE->value,
                StoneNamesEnum::TSAVORITE->value,
                StoneNamesEnum::RED_NOBLE_SPINEL->value,
            ],
            self::SECOND_JWLY_GRADE => [
                StoneNamesEnum::AQUAMARINE->value,
                StoneNamesEnum::AMETRINE->value,
                StoneNamesEnum::BIXBIT->value,
                StoneNamesEnum::MORGANITE->value,
                StoneNamesEnum::HYACINTH->value,
                StoneNamesEnum::HIDDEN->value,
                StoneNamesEnum::NATURAL_RIVER_PEARLS->value,
                StoneNamesEnum::CULTURED_SEA_PEARLS->value,
                StoneNamesEnum::STAR_RUBY->value,
                StoneNamesEnum::STAR_SAPPHIRE->value,
                StoneNamesEnum::KUNZITE->value,
                StoneNamesEnum::MAXIS->value,
                StoneNamesEnum::MALAYA->value,
                StoneNamesEnum::WHITE_NOBLE_OPAL->value,
                StoneNamesEnum::NOBLE_FIRE_OPAL->value,
                StoneNamesEnum::RUBELLITE->value,
                StoneNamesEnum::SAPPHIRE_GREEN->value,
                StoneNamesEnum::SAPPHIRE_YELLOW->value,
                StoneNamesEnum::SAPPHIRE_PURPLE->value,
                StoneNamesEnum::TOPAZOLITE->value,
                StoneNamesEnum::TOPAZ_IMPERIAL->value,
                StoneNamesEnum::POLYCHROME_TOURMALINE->value,
                StoneNamesEnum::PHENACITE->value,
                StoneNamesEnum::BLUE_SPINEL->value,
                StoneNamesEnum::PURPLE_SPINEL->value,
                StoneNamesEnum::PINK_SPINEL->value,
                StoneNamesEnum::TOURMALINE->value,
                StoneNamesEnum::RHODOLITE->value,
            ],
            self::THIRD_JWLY_GRADE  => [
                StoneNamesEnum::ALMANDINE->value,
                StoneNamesEnum::GROSSULAR->value,
                StoneNamesEnum::AMETHYST->value,
                StoneNamesEnum::VERDELITE->value,
                StoneNamesEnum::HELIODOR->value,
                StoneNamesEnum::GOSHENITE->value,
                StoneNamesEnum::STAR_DIOPSIDE->value,
                StoneNamesEnum::INDIGOLITE->value,
                StoneNamesEnum::LEUCO_SAPPHIRE->value,
                StoneNamesEnum::PYROPE->value,
                StoneNamesEnum::PRASIOLITE->value,
                StoneNamesEnum::SPESSARTINE->value,
                StoneNamesEnum::PINK_TOPAZ->value,
                StoneNamesEnum::BLUE_TOPAZ->value,
                StoneNamesEnum::YELLOW_TOPAZ->value,
                StoneNamesEnum::COLOURLESS_TOPAZ->value,
                StoneNamesEnum::UVAROVITE->value,
                StoneNamesEnum::CHRYSOLITE->value,
                StoneNamesEnum::CYMOPHANE->value,
                StoneNamesEnum::CITRINE->value,
                StoneNamesEnum::RUTILATED_QUARTZ->value,
            ],
            self::FOURTH_JWLY_GRADE => [
                StoneNamesEnum::AXINITE->value,
                StoneNamesEnum::ANDALUSITE->value,
                StoneNamesEnum::APATITE->value,
                StoneNamesEnum::ANDRADITE->value,
                StoneNamesEnum::ACHROITE->value,
                StoneNamesEnum::BRAZILIANITE->value,
                StoneNamesEnum::VESUVIAN->value,
                StoneNamesEnum::DANBURITE->value,
                StoneNamesEnum::DRAVITE->value,
                StoneNamesEnum::CULTURED_RIVER_PEARLS->value,
                StoneNamesEnum::IOLITE->value,
                StoneNamesEnum::CASSITERITE->value,
                StoneNamesEnum::KYANITE->value,
                StoneNamesEnum::CLINOHUMITE->value,
                StoneNamesEnum::CLEIOPHANES->value,
                StoneNamesEnum::CORDIERITE->value,
                StoneNamesEnum::CORNERUPIN->value,
                StoneNamesEnum::MARMATITE->value,
                StoneNamesEnum::MOLDAVITE->value,
                StoneNamesEnum::MORION->value,
                StoneNamesEnum::MOTHER_PEARL->value,
                StoneNamesEnum::PRSHIBRAMIT->value,
                StoneNamesEnum::PREHNITE->value,
                StoneNamesEnum::SCAPOLITE->value,
                StoneNamesEnum::HAWKEYE->value,
                StoneNamesEnum::SPHENE->value,
                StoneNamesEnum::TEKTITE->value,
                StoneNamesEnum::TIGER_EYE->value,
                StoneNamesEnum::CHROME_DIOPSID->value,
                StoneNamesEnum::SCHEELITIS->value,
                StoneNamesEnum::EUCLASE->value,
                StoneNamesEnum::EPIDOTE->value,
            ],
        };
    }
}
