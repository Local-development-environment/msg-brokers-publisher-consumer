<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryViews\Repositories;

use Domain\Jewelleries\JewelleryViews\Models\VJewellery;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class VJewelleryRepository implements VJewelleryCachedRepositoryInterface
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(VJewellery::class)
//            ->allowedIncludes(['jewelleryView'])
            ->allowedFilters([
                AllowedFilter::exact('id'),
                AllowedFilter::exact('category_id'),
                AllowedFilter::exact('part_number'),
                AllowedFilter::exact('approx_weight')
            ])
            ->allowedSorts(['id', 'weight'])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function show(array $data, int $id): VJewellery
    {
        return QueryBuilder::for(VJewellery::class)
            ->where('id', $id)
//            ->allowedIncludes(['jewelleryView'])
            ->firstOrFail();
    }
}