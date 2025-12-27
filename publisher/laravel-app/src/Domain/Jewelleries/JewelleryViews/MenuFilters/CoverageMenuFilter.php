<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryViews\MenuFilters;

use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\QueryBuilder;

final class CoverageMenuFilter implements MenuFilterInterface
{
    public function __invoke(QueryBuilder $queryBuilder): array
    {
        return $queryBuilder
            ->selectRaw('distinct c.id, c.name')
            ->crossJoin(DB::raw(
                "JSON_TABLE(
                coverings,
                '$[*]'
                COLUMNS(
                    id INT PATH '$.coverage_id',
                    name varchar(50) PATH '$.coverage'
                )
            ) c"
            ))
            ->orderBy('c.id')
            ->get()
            ->toArray();
    }
}