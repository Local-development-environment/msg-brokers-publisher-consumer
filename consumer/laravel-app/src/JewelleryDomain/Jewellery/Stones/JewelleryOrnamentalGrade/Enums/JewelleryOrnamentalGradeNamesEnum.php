<?php

namespace JewelleryDomain\Jewellery\Stones\JewelleryOrnamentalGrade\Enums;

use JewelleryDomain\Jewellery\Stones\Stone\Enums\StoneNamesEnum;
use JewelleryDomain\Jewellery\Stones\StoneGroup\Enums\StoneGroupNamesEnum;

enum JewelleryOrnamentalGradeNamesEnum: string
{
    case FIRST_JWLY_ORNAM_GRADE = 'ювелирно-поделочный камень первого порядка';
    case SECOND_JWLY_ORNAM_GRADE = 'ювелирно-поделочный камень второго порядка';

    public function description(): string
    {
        return match ($this) {
            self::FIRST_JWLY_ORNAM_GRADE  => 'для обозначения ювелирно-поделочных камней первого порядка',
            self::SECOND_JWLY_ORNAM_GRADE => 'для обозначения ювелирно-поделочных камней второго порядка',
        };
    }

    public function groups(): string
    {
        return match ($this) {
            self::FIRST_JWLY_ORNAM_GRADE,
            self::SECOND_JWLY_ORNAM_GRADE => StoneGroupNamesEnum::JEWELLERY_ORNAMENTAL->value,
        };
    }

    public function jewelleryOrnamentalStones(): array
    {
        return match ($this) {
            self::FIRST_JWLY_ORNAM_GRADE  => [
                StoneNamesEnum::AGATE->value,
                StoneNamesEnum::AZURITE->value,
                StoneNamesEnum::ANYOLITE->value,
                StoneNamesEnum::BLUE_TURQUOISE->value,
                StoneNamesEnum::GREEN_TURQUOISE->value,
                StoneNamesEnum::HELIOTROPE->value,
                StoneNamesEnum::DUMORTIERITE->value,
                StoneNamesEnum::JADEITE->value,
                StoneNamesEnum::CARNELIAN->value,
                StoneNamesEnum::CORAL->value,
                StoneNamesEnum::LAZURITE->value,
                StoneNamesEnum::MALACHITE->value,
                StoneNamesEnum::MAMMOTH_BONE->value,
                StoneNamesEnum::NEPHRITIS->value,
                StoneNamesEnum::ONYX->value,
                StoneNamesEnum::RHODOCHROSITE->value,
                StoneNamesEnum::RHODONITE->value,
                StoneNamesEnum::SARDER->value,
                StoneNamesEnum::SAPPHIRINE->value,
                StoneNamesEnum::CORNELIAN->value,
                StoneNamesEnum::IVORY->value,
                StoneNamesEnum::SODALITE->value,
                StoneNamesEnum::SUGILITE->value,
                StoneNamesEnum::CHRYSOPRASE->value,
                StoneNamesEnum::CHRYSOKOLLA->value,
                StoneNamesEnum::CHAROITE->value,
                StoneNamesEnum::EUDIALYTE->value,
                StoneNamesEnum::AMBER->value,
            ],
            self::SECOND_JWLY_ORNAM_GRADE => [
                StoneNamesEnum::AVENTURINE->value,
                StoneNamesEnum::ADULARIA->value,
                StoneNamesEnum::ACTINOLITE->value,
                StoneNamesEnum::AMAZONITE->value,
                StoneNamesEnum::ASTROFYLITIS->value,
                StoneNamesEnum::BELOMORITE->value,
                StoneNamesEnum::HEMATITE->value,
                StoneNamesEnum::RHINESTONE->value,
                StoneNamesEnum::JADE->value,
                StoneNamesEnum::LABRADORITE->value,
                StoneNamesEnum::LARIMAR->value,
                StoneNamesEnum::OBSIDIAN_IRIDESCENT->value,
                StoneNamesEnum::OPAL->value,
                StoneNamesEnum::PETALITE->value,
                StoneNamesEnum::RHODUSITE->value,
                StoneNamesEnum::CIMBIRCITE->value,
                StoneNamesEnum::ROSE_QUARTZ->value,
                StoneNamesEnum::SMOKEY_QUARTZ->value,
                StoneNamesEnum::SNOW_QUARTZ->value,
                StoneNamesEnum::SUNSTONE->value,
                StoneNamesEnum::SPECTROLITE->value,
                StoneNamesEnum::STAUROLITE->value,
                StoneNamesEnum::TUGTUPITE->value,
                StoneNamesEnum::ELEOLITHIC->value,
                StoneNamesEnum::JASPER_SMALL_DRAWN->value,
                StoneNamesEnum::JASPER_LANDSCAPE->value,
            ],
        };
    }
}
