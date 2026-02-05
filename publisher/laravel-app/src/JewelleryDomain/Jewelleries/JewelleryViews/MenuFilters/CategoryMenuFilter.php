<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryViews\MenuFilters;

use JewelleryDomain\Jewelleries\JewelleryCategories\Enums\JewelleryCategoryEnum;
use JewelleryDomain\Jewelleries\JewelleryViews\Enums\VJewelleryEnum;
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
