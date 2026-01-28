<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\CoverageItems\MetalCoverages;

use JewelleryDomain\Jewellery\CoverageItems\Coverage\Enums\CoverageNamesEnum;
use Random\RandomException;

final class GoldCoverage
{
    /**
     * @throws RandomException
     */
    public function getGoldCoverage(bool $enamel = true): array
    {
        $num = random_int(1, 100);

        return match (true) {
            $num < 50 => [CoverageNamesEnum::RHODIUM_PLATING->value],
            $num < 60 => [CoverageNamesEnum::DIAMOND_CUT->value],
            $num < 65 => $enamel ? [CoverageNamesEnum::ENAMEL->value] : [CoverageNamesEnum::RHODIUM_PLATING->value],
            $num < 85 => [CoverageNamesEnum::RHODIUM_PLATING->value, CoverageNamesEnum::DIAMOND_CUT->value],
            $num < 90 => $enamel ? [CoverageNamesEnum::RHODIUM_PLATING->value, CoverageNamesEnum::ENAMEL->value] :
                [CoverageNamesEnum::RHODIUM_PLATING->value],
            $num <= 100 => [],
        };
    }
}
