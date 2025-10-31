<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryViews\MenuFilters;

use Domain\Inserts\Inserts\Enums\InsertEnum;
use Domain\Jewelleries\JewelleryViews\Enums\VJewelleryEnum;
use Spatie\QueryBuilder\QueryBuilder;

final class IsInsertMenuFilter
{
    public function __invoke(QueryBuilder $queryBuilder): array
    {
        return $queryBuilder
            ->selectRaw(
                'jsonb_array_length(inserts) > 0 as is_insert'
            )
            ->groupBy('is_insert')
            ->pluck('is_insert')
            ->toArray();
    }
}