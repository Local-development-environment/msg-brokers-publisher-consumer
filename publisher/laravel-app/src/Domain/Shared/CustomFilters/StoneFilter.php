<?php

declare(strict_types=1);

namespace Domain\Shared\CustomFilters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\Filters\Filter;

final class StoneFilter implements Filter
{

    /**
     * @inheritDoc
     */
    public function __invoke(Builder $query, mixed $value, string $property): void
    {
//        if (is_array($value)) {
//            $query->whereNotNull('metals')->where(function (Builder $query) use ($value) {
//                foreach ($value as $key => $item) {
//                    $item = (int)$item;
//
//                    if (!$key) {
//                        $query->whereNotNull('coverages')->whereRaw("JSON_CONTAINS(`coverages`, '{\"coverage_id\": $item}', '$')");
//                    } else {
//                        $query->whereNotNull('coverages')->orWhereRaw("JSON_CONTAINS(`coverages`, '{\"coverage_id\": $item}', '$')");
//                    }
//                }
//            });
//        } else {
//            $query->where(function (Builder $query) use ($value) {
//                $query->whereNotNull('coverages')->whereRaw("JSON_CONTAINS(`coverages`, '{\"coverage_id\": $value}', '$')");
//            });
//        }
    }
}