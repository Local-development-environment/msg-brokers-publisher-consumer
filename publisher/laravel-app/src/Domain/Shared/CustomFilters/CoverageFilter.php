<?php

declare(strict_types=1);

namespace Domain\Shared\CustomFilters;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

final class CoverageFilter implements Filter
{

    /**
     * @inheritDoc
     */
    public function __invoke(Builder $query, mixed $value, string $property): void
    {
        if (is_array($value)) {
            $query->whereNotNull('coverages')->where(function (Builder $query) use ($value) {
                foreach ($value as $key => $item) {
                    $item = (int)$item;

                    if (!$key) {
                        $query->whereRaw("jw_views.v_jewelleries.coverages @@ '$[*].coverage_id == $item'");
                    } else {
                        $query->orWhereRaw("jw_views.v_jewelleries.coverages @@ '$[*].coverage_id == $item'");
                    }
                }
            });
        } else {
            $query->whereNotNull('coverages')->whereRaw("jw_views.v_jewelleries.coverages @@ '$[*].coverage_id == $value'");
        }
    }
}