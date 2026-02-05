<?php

namespace JewelleryDomain\Jewellery\Stones\StoneTreatment\Enums;

use JewelleryDomain\Jewellery\Stones\Stone\Enums\StoneNamesEnum;

enum StoneTreatmentNamesEnum: string
{
    case CABOCHON = 'кабошон';
    case CUT      = 'фасетная';

    public function description(): string
    {
        return match ($this) {
            self::CABOCHON => 'обработка камня полировкой до гладкой поверхности',
            self::CUT      => 'обработка камня созданием граней',
        };
    }

    public function stones(): array
    {
        return match ($this) {
            self::CABOCHON => [
                // Precious
                StoneNamesEnum::NATURAL_SEA_PEARL->value,
            ],
            self::CUT => [
                // Precious stones
                StoneNamesEnum::DIAMOND->value,
                StoneNamesEnum::ALEXANDRITE->value,
                StoneNamesEnum::EMERALD->value,
                StoneNamesEnum::RUBY->value,
                StoneNamesEnum::SAPPHIRE->value,
                // Jewellery stones 1-st order
                StoneNamesEnum::DEMANTOID->value,
                StoneNamesEnum::PADPARADSCHA->value,
                StoneNamesEnum::SAPPHIRE_PINK->value,
                StoneNamesEnum::TANZANITE->value,
                StoneNamesEnum::PARAIBA_TOURMALINE->value,
                StoneNamesEnum::TSAVORITE->value,
                StoneNamesEnum::RED_NOBLE_SPINEL->value,
                // Jewellery stones 2-nd order

            ],
        };
    }
}
