<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryViews\MenuFilters;

use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\QueryBuilder;

final class InsertStoneGroupMenuFilter implements MenuFilterInterface
{

    public function __invoke(QueryBuilder $queryBuilder): array
    {
        return $queryBuilder
            ->selectRaw('distinct g.id, g.name')
            ->crossJoin(DB::raw(
                "JSON_TABLE(
                inserts,
                '$[*]'
                COLUMNS(
                    id INT PATH '$.classification.group_id',
                    name varchar(50) PATH '$.classification.group_name',
                    stone_id int path '$.stone.id'
                )
            ) g"
            ))
            ->join('jw_inserts.stone_groups', 'g.id', '=', 'jw_inserts.stone_groups.id')
            ->orderBy('g.id')
            ->get()
            ->toArray();
    }
}
