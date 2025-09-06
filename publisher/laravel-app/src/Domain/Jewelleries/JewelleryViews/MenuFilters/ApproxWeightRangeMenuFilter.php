<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryViews\MenuFilters;

use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\QueryBuilder;

final class ApproxWeightRangeMenuFilter implements MenuFilterInterface
{

    public function __invoke(QueryBuilder $queryBuilder): array
    {
        return $queryBuilder
            ->select(DB::raw('max(approx_weight) as max_weight, min(approx_weight) as min_weight'))
            ->get()
            ->toArray();
    }
}