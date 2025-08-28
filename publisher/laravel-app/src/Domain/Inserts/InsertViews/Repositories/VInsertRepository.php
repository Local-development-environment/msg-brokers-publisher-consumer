<?php

declare(strict_types=1);

namespace Domain\Inserts\InsertViews\Repositories;

use Domain\Inserts\InsertViews\Models\VInsert;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Contracts\Pagination\Paginator;

final class VInsertRepository implements VInsertCachedRepositoryInterface
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(VInsert::class)
//            ->allowedIncludes(['jewelleryView'])
            ->allowedFilters([
                AllowedFilter::exact('id'),
                AllowedFilter::exact('jewellery_id'),
                AllowedFilter::exact('stone_id'),
                AllowedFilter::exact('origin_id'),
                AllowedFilter::exact('optical_effect_id'),
                AllowedFilter::exact('stone_grade_id'),
                AllowedFilter::exact('stone_group_id'),
                AllowedFilter::exact('stone_family_id'),
                AllowedFilter::exact('stone_colour_id'),
                AllowedFilter::exact('stone_facet_id'),
                AllowedFilter::exact('stone_quantity'),
                AllowedFilter::exact('stone_weight'),
            ])
            ->allowedSorts(['id', 'weight'])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function show(array $data, int $id): VInsert
    {
        return QueryBuilder::for(VInsert::class)
            ->where('id', $id)
//            ->allowedIncludes(['jewelleryView'])
            ->firstOrFail();
    }
}
