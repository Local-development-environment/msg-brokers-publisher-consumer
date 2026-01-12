<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryViews\MenuFilters;

use Domain\Jewelleries\JewelleryCategories\Enums\JewelleryCategoryEnum;
use Domain\Jewelleries\JewelleryViews\Enums\VJewelleryEnum;
use Spatie\QueryBuilder\QueryBuilder;

final readonly class CategoryMenuFilter
{
    public function __invoke(QueryBuilder $queryBuilder): array
    {
        return $queryBuilder
            ->join(JewelleryCategoryEnum::TABLE_NAME->value . ' as jc', VJewelleryEnum::FK_JEWELLERY_CATEGORY->value, '=', 'jc.id')
            ->select('jc.id', 'jc.name')
            ->groupBy('jc.id')
            ->orderBy('jc.id')
            ->get()
            ->toArray();
    }
}
