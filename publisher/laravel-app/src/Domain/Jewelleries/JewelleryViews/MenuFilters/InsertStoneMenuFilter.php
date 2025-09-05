<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryViews\MenuFilters;

use Domain\Jewelleries\JewelleryViews\Enums\VJewelleryFilterEnum;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\QueryBuilder;

final class InsertStoneMenuFilter implements MenuFilterInterface
{

    public function __invoke(QueryBuilder $queryBuilder): array
    {
        return $queryBuilder
            ->selectRaw('distinct s.id, s.name')
            ->crossJoin(DB::raw(
                "JSON_TABLE(
                inserts,
                '$[*]'
                COLUMNS(
                    id INT PATH '$.stone.id',
                    name varchar(50) PATH '$.stone.name',
                    family_id int path '$.family.id',
                    group_id int path '$.classification.group_id'
                )
            ) s"
            ))
            ->join('jw_inserts.stone_families', 's.id', '=', 'jw_inserts.stone_families.id')
            ->get()
            ->toArray();
    }
}