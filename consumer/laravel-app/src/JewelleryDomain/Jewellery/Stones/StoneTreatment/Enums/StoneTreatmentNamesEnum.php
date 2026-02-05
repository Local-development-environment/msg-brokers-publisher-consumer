<?php

namespace JewelleryDomain\Jewellery\Stones\StoneTreatment\Enums;

use JewelleryDomain\Jewellery\BeadItems\BeadItem\Enums\BeadItemNamesEnum;
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
                StoneNamesEnum::NATURAL_SEA_PEARL->value,
                StoneNamesEnum::NATURAL_RIVER_PEARL->value,
                StoneNamesEnum::CULTURED_RIVER_PEARL->value,
                StoneNamesEnum::CULTURED_SEA_PEARL->value,
            ],
            self::CUT => [
                StoneNamesEnum::DIAMOND->value,
                StoneNamesEnum::ALEXANDRITE->value,
                StoneNamesEnum::EMERALD->value,
                StoneNamesEnum::RUBY->value,
                StoneNamesEnum::SAPPHIRE->value,
                StoneNamesEnum::DEMANTOID->value,
                StoneNamesEnum::PADPARADSCHA->value,
                StoneNamesEnum::SAPPHIRE_PINK->value,
                StoneNamesEnum::TANZANITE->value,
                StoneNamesEnum::PARAIBA_TOURMALINE->value,
                StoneNamesEnum::TSAVORITE->value,
                StoneNamesEnum::RED_NOBLE_SPINEL->value,


            ],
        };
    }

    public function beads(): array
    {
        return match ($this) {
            self::CABOCHON => [
                BeadItemNamesEnum::NATURAL_RIVER_PEARL_BEAD->value,
                BeadItemNamesEnum::CULTURED_RIVER_PEARL_BEAD->value,
                BeadItemNamesEnum::NATURAL_SEA_PEARL_BEAD->value,
                BeadItemNamesEnum::CULTURED_SEA_PEARL_BEAD->value,
            ],
            self::CUT      => [

            ],
        };
    }
}
