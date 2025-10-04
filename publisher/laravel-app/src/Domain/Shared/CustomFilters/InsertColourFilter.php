<?php

declare(strict_types=1);

namespace Domain\Shared\CustomFilters;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

final class InsertColourFilter implements Filter
{

    /**
     * @inheritDoc
     */
    public function __invoke(Builder $query, mixed $value, string $property): void
    {
//        dd($value);
        if (is_array($value)) {
            $query->whereNotNull('stone_max_colour_id')->where(function (Builder $query) use ($value) {
                foreach ($value as $key => $item) {
                    $item = (int)$item;

                    if (!$key) {
//                        $query->whereRaw("jw_views.v_jewelleries.inserts @@ '$[*].metal_id == $item'");
//                        $query->whereRaw("jw_views.v_jewelleries.inserts @@ '$[*].stone.max_weight != null'");
                        $query->orWhereRaw("stone_max_colour_id == $item");
                    } else {
                        $query->orWhereRaw("stone_max_colour_id == $item");
                    }
                }
            });
        } else {

//            $query->whereNotNull('metals')->whereRaw("jw_views.v_jewelleries.metals @@ '$[*].metal_id == $value'");
            $query->whereNotNull('stone_max_colour_id')
//                ->whereRaw("jw_views.v_jewelleries.inserts @@ '$[*].stone.max_weight != null'")
//                ->whereRaw("jw_views.v_jewelleries.inserts @@ '$[*].exterior.colour_id == $value'")
//                ->orWhereRaw("jw_views.v_jewelleries.stone_max_colour_id == $value")
                ->whereRaw("stone_max_colour_id", '=', "$value")
//                ->whereRaw("jw_views.v_jewelleries.inserts @@ '$[*].exterior.colour_id == $value'" and "jw_views.v_jewelleries.inserts @@ '$[*].stone.max_weight != null'")
            ;
        }
    }
}