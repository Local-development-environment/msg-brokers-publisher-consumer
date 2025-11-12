<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries;

use Domain\Jewelleries\Categories\Enums\CategoryListEnum;
use Domain\JewelleryGenerator\Traits\ProbabilityArrayElementTrait;

final class Category
{
    use ProbabilityArrayElementTrait;

    public function getCategory(): string
    {
        $enumClass = get_class(CategoryListEnum::BEADS);
        $enumCases = CategoryListEnum::cases();

        return $this->getArrElement($enumClass, $enumCases);
    }
}
