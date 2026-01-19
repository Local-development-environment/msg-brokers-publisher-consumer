<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\JewelleryCategories;

use JewelleryDomain\Jewellery\JewelleryCategoryItems\JewelleryCategory\Enums\JewelleryCategoryNamesEnum;
use JewelleryDomain\TestDataGeneration\Traits\RandomArrayElementWithProbabilityTrait;

final class JewelleryCategoryGenerator
{
    use RandomArrayElementWithProbabilityTrait;

    public function getCategory(): string
    {
        $enumClass = get_class(JewelleryCategoryNamesEnum::BEADS);
        $enumCases = JewelleryCategoryNamesEnum::cases();

        return $this->getArrElement($enumCases, $enumClass);
    }
}
