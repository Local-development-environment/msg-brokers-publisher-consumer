<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryViews\MenuFilters;

use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\QueryBuilder;

final readonly class PriceRangeMenuFilter
{
    public function __invoke(QueryBuilder $queryBuilder): array
    {
        return $queryBuilder
            ->select(DB::raw('max(max_price) as max_price, min(min_price) as min_price'))
            ->get()
            ->toArray();
    }
}