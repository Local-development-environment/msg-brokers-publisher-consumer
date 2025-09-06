<?php

declare(strict_types=1);

namespace Domain\Shared\CustomFilters;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

final class ApproxWeightFilter implements Filter
{

    /**
     * @inheritDoc
     */
    public function __invoke(Builder $query, mixed $value, string $property): void
    {
        $query->where(function (Builder $query) use ($value) {
            $query->whereBetween('approx_weight', [(int)$value[0], (int)$value[1]]);
        });
    }
}