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
        if (is_array($value)) {
            $query->whereNotNull('inserts')->where(function (Builder $query) use ($value) {
                foreach ($value as $key => $item) {
                    $item = (int)$item;

                    if (!$key) {
                        $query->whereRaw("jw_views.v_jewelleries.inserts @@ '$[*].stone.id == $item'");
                    } else {
                        $query->orWhereRaw("jw_views.v_jewelleries.inserts @@ '$[*].stone.id == $item'");
                    }
                }
            });
        } else {
            $query->whereNotNull('inserts')->whereRaw("jw_views.v_jewelleries.inserts @@ '$[*].stone.id == $value'");
        }
    }
}