<?php

declare(strict_types=1);

namespace Domain\Shared\CustomFilters;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

final class PriceFilter implements Filter
{
    /**
     * @inheritDoc
     */
    public function __invoke(Builder $query, mixed $value, string $property): void
    {
        $query->where(function (Builder $query) use ($value) {
            $query->whereBetween('min_price', [(int)$value[0], (int)$value[1]])
                ->orWhereBetween('max_price', [(int)$value[0], (int)$value[1]]);
        });
    }
}