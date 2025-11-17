<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries;

use Domain\Jewelleries\Categories\Enums\CategoryEnum;
use Domain\Jewelleries\Categories\Enums\CategoryBuildEnum;
use Domain\JewelleryGenerator\Traits\ProbabilityArrayElementTrait;
use Illuminate\Support\Facades\DB;

final class Category
{
    use ProbabilityArrayElementTrait;

    public function getCategory(): ?object
    {
        $enumClass = get_class(CategoryBuildEnum::BEADS);
        $enumCases = CategoryBuildEnum::cases();

        $category = $this->getArrElement($enumClass, $enumCases);

        return DB::table(CategoryEnum::TABLE_NAME->value)->where('name', $category)->first();
    }
}
