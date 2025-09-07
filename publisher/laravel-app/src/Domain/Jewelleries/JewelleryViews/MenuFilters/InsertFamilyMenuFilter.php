<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryViews\MenuFilters;

use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\QueryBuilder;

final class InsertFamilyMenuFilter implements MenuFilterInterface
{

    public function __invoke(QueryBuilder $queryBuilder): array
    {
        return $queryBuilder
            ->selectRaw('distinct f.id, f.name')
            ->crossJoin(DB::raw(
                "JSON_TABLE(
                inserts,
                '$[*]'
                COLUMNS(
                    id INT PATH '$.family.id',
                    name varchar(50) PATH '$.family.name',
                    stone_id int path '$.stone.id'
                )
            ) f"
            ))
            ->join('jw_inserts.stone_families', 'f.id', '=', 'jw_inserts.stone_families.id')
            ->orderBy('f.id')
            ->get()
            ->toArray();
    }
}