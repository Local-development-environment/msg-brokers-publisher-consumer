<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\CoverageItems\MetalCoverages;

use JewelleryDomain\Jewellery\CoverageItems\Coverage\Enums\CoverageNamesEnum;
use Random\RandomException;

final class PlatinumCoverage
{
    /**
     * @throws RandomException
     */
    public function getPlatinumCoverage(): array
    {
        return random_int(0, 1) === 0 ? [] : [CoverageNamesEnum::DIAMOND_CUT->value];
    }
}
