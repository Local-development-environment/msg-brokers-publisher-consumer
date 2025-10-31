<?php

declare(strict_types=1);

namespace Domain\Shared\CustomFilters;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

final class IsInsertFilter implements Filter
{

    public function __invoke(Builder $query, mixed $value, string $property)
    {
//        dd($query->whereRaw("jsonb_array_length(jw_views.v_jewelleries.inserts) = 0")->get());
        $query->where(function (Builder $query) use ($value) {
            if ($value === '1') {
                $query->whereRaw("jsonb_array_length(jw_views.v_jewelleries.inserts) > 0");
            }
            if ($value === '0') {
                $query->whereRaw("jsonb_array_length(jw_views.v_jewelleries.inserts) = 0");
            }
//            $query->whereBetween('approx_weight', [(float)$value[0], (float)$value[1]]);
        });
    }
}