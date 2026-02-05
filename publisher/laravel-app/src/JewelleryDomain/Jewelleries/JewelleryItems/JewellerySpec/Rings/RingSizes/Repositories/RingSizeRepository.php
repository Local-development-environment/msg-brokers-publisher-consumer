<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingSizes\Repositories;

use Illuminate\Contracts\Pagination\Paginator;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingSizes\Enums\RingSizeEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingSizes\Enums\RingSizeRelationshipsEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingSizes\Models\RingSize;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class RingSizeRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(RingSize::class)
            ->allowedIncludes([
                RingSizeRelationshipsEnum::RINGS->value,
                RingSizeRelationshipsEnum::RING_METRICS->value,
            ])
            ->allowedFilters([
                AllowedFilter::exact(RingSizeEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): RingSize
    {
        return RingSize::create($data);
    }

    public function show(array $data, int $id): RingSize
    {
        return QueryBuilder::for(RingSize::class)
            ->where(RingSizeEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                RingSizeRelationshipsEnum::RINGS->value,
                RingSizeRelationshipsEnum::RING_METRICS->value,
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        RingSize::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        RingSize::findOrFail($id)->delete();
    }
}
