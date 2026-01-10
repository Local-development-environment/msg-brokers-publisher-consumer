<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Rings\RingDetails\Repositories;

use Domain\JewelleryProperties\Rings\RingDetails\Enums\RingDetailEnum;
use Domain\JewelleryProperties\Rings\RingDetails\Enums\RingDetailRelationshipsEnum;
use Domain\JewelleryProperties\Rings\RingDetails\Models\RingDetail;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class RingDetailRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(RingDetail::class)
            ->allowedIncludes([
                RingDetailRelationshipsEnum::RING->value,
                RingDetailRelationshipsEnum::RING_TYPE->value,
            ])
            ->allowedFilters([
                AllowedFilter::exact(RingDetailEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): RingDetail
    {
        return RingDetail::create($data);
    }

    public function show(array $data, int $id): RingDetail
    {
        return QueryBuilder::for(RingDetail::class)
            ->where(RingDetailEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                RingDetailRelationshipsEnum::RING->value,
                RingDetailRelationshipsEnum::RING_TYPE->value,
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        RingDetail::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        RingDetail::findOrFail($id)->delete();
    }
}
