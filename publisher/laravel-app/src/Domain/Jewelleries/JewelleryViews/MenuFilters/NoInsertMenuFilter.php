<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryViews\MenuFilters;

use Domain\Inserts\Inserts\Enums\InsertEnum;
use Domain\Jewelleries\JewelleryViews\Enums\VJewelleryEnum;
use Spatie\QueryBuilder\QueryBuilder;

final class NoInsertMenuFilter
{
    public function __invoke(QueryBuilder $queryBuilder): int
    {
        return $queryBuilder
            ->select('inserts')
            ->whereNull('inserts')
            ->count();
    }
}