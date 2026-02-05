<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\Categories;

use Domain\JewelleryGenerator\Traits\ProbabilityArrayElementTrait;
use JewelleryDomain\Jewelleries\JewelleryCategories\Enums\JewelleryCategoryBuilderEnum;

final class Category
{
    use ProbabilityArrayElementTrait;

    public function getCategory(): string
    {
        $enumClass = get_class(JewelleryCategoryBuilderEnum::BEADS);
        $enumCases = JewelleryCategoryBuilderEnum::cases();

        return $this->getArrElement($enumCases, $enumClass);
    }
}
