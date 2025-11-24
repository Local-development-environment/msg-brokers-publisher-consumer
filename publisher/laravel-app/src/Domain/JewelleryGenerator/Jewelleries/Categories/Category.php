<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\Categories;

use Domain\Jewelleries\Categories\Enums\CategoryBuilderEnum;
use Domain\JewelleryGenerator\Traits\ProbabilityArrayElementTrait;

final class Category
{
    use ProbabilityArrayElementTrait;

    public function getCategory(): string
    {
        $enumClass = get_class(CategoryBuilderEnum::BEADS);
        $enumCases = CategoryBuilderEnum::cases();

        return $this->getArrElement($enumClass, $enumCases);
    }
}
