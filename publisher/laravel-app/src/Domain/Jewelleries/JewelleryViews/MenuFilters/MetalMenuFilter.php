<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryViews\MenuFilters;

use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\QueryBuilder;

final readonly class MetalMenuFilter
{
    public function __invoke(QueryBuilder $queryBuilder): array
    {
        return $queryBuilder
            ->selectRaw('distinct m.id, m.name')
            ->crossJoin(DB::raw(
                "JSON_TABLE(
                metals,
                '$[*]'
                COLUMNS(
                    id INT PATH '$.metal_id',
                    name varchar(50) PATH '$.metal'
                )
            ) m"
            ))
            ->get()
            ->toArray();
    }
}