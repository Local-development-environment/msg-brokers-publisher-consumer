<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Rings\RingFingers\Repositories;

use Domain\JewelleryProperties\Rings\RingFingers\Enums\RingFingerEnum;
use Domain\JewelleryProperties\Rings\RingFingers\Enums\RingFingerRelationshipsEnum;
use Domain\JewelleryProperties\Rings\RingFingers\Models\RingFinger;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class RingFingerRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(RingFinger::class)
            ->allowedIncludes([
                RingFingerRelationshipsEnum::RINGS->value,
            ])
            ->allowedFilters([
                AllowedFilter::exact(RingFingerEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): RingFinger
    {
        return RingFinger::create($data);
    }

    public function show(array $data, int $id): RingFinger
    {
        return QueryBuilder::for(RingFinger::class)
            ->where(RingFingerEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                RingFingerRelationshipsEnum::RINGS->value
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        RingFinger::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        RingFinger::findOrFail($id)->delete();
    }
}
