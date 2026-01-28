<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewellery\CoverageItems\CoverageType\Enums;

use JewelleryDomain\Jewellery\CoverageItems\Coverage\Enums\CoverageNamesEnum;

enum CoverageTypeNamesEnum: string
{
    case DECORATION = 'декоративное';
    case PROTECTION = 'защитное';

    public function coverages(): array
    {
        return match ($this) {
            self::DECORATION => [
                CoverageNamesEnum::DIAMOND_CUT->value,
                CoverageNamesEnum::ENAMEL->value,
                CoverageNamesEnum::GOLDING->value
            ],
            self::PROTECTION => [
                CoverageNamesEnum::OXIDATION->value,
                CoverageNamesEnum::RHODIUM_PLATING->value,
            ],
        };
    }
}
