<?php

declare(strict_types=1);

namespace Domain\Shared\CustomFilters;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

final class IsInsertFilter implements Filter
{

    public function __invoke(Builder $query, mixed $value, string $property)
    {
        $query->where(function (Builder $query) use ($value) {
            if ($value === '1') {
                $query->whereRaw("jsonb_array_length(jw_views.v_jewelleries.inserts) > 0");
            }
            if ($value === '0') {
                $query->whereRaw("jsonb_array_length(jw_views.v_jewelleries.inserts) = 0");
            }
        });
    }
}