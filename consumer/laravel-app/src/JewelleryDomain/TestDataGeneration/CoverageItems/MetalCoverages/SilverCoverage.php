<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\CoverageItems\MetalCoverages;

use JewelleryDomain\Jewellery\CoverageItems\Coverage\Enums\CoverageNamesEnum;
use Random\RandomException;

final class SilverCoverage
{
    /**
     * @throws RandomException
     */
    public function getSilverCoverage(bool $enamel = true): array
    {
        $num = random_int(1, 100);

        return match (true) {
            $num < 30 => random_int(0, 1) === 0 ?
                [CoverageNamesEnum::RHODIUM_PLATING->value] : [CoverageNamesEnum::OXIDATION->value],
            $num < 35 => $enamel ? [CoverageNamesEnum::ENAMEL->value] : [CoverageNamesEnum::RHODIUM_PLATING->value],
            $num < 50 => random_int(0, 1) === 0 ?
                [CoverageNamesEnum::DIAMOND_CUT->value] : [CoverageNamesEnum::GOLDING->value],
            $num < 65 => [CoverageNamesEnum::RHODIUM_PLATING->value, random_int(0, 1) === 0 ?
                CoverageNamesEnum::GOLDING->value : CoverageNamesEnum::DIAMOND_CUT->value],
            $num < 70 => $enamel ? [CoverageNamesEnum::RHODIUM_PLATING->value, CoverageNamesEnum::ENAMEL->value] :
                [CoverageNamesEnum::OXIDATION->value],
            $num < 75 => $enamel ? [CoverageNamesEnum::OXIDATION->value, CoverageNamesEnum::ENAMEL->value] :
                [CoverageNamesEnum::RHODIUM_PLATING->value],
            $num < 90 => [CoverageNamesEnum::OXIDATION->value, random_int(0, 1) === 0 ?
                CoverageNamesEnum::DIAMOND_CUT->value : CoverageNamesEnum::GOLDING->value],
            $num <= 100 => [],
        };
    }
}
