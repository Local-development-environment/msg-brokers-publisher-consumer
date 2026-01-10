<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Rings\RingTypes\Repositories;

use Domain\JewelleryProperties\Rings\RingTypes\Enums\RingTypeEnum;
use Domain\JewelleryProperties\Rings\RingTypes\Enums\RingTypeRelationshipsEnum;
use Domain\JewelleryProperties\Rings\RingTypes\Models\RingType;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class RingTypeRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(RingType::class)
            ->allowedIncludes([
                RingTypeRelationshipsEnum::RINGS->value,
                RingTypeRelationshipsEnum::RING_DETAILS->value,
            ])
            ->allowedFilters([
                AllowedFilter::exact(RingTypeEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): RingType
    {
        return RingType::create($data);
    }

    public function show(array $data, int $id): RingType
    {
        return QueryBuilder::for(RingType::class)
            ->where(RingTypeEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                RingTypeRelationshipsEnum::RINGS->value,
                RingTypeRelationshipsEnum::RING_DETAILS->value,
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        RingType::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        RingType::findOrFail($id)->delete();
    }
}
