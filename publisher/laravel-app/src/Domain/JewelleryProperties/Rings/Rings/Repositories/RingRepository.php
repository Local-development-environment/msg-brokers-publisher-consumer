<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Rings\Rings\Repositories;

use Domain\JewelleryProperties\Rings\Rings\Enums\RingEnum;
use Domain\JewelleryProperties\Rings\Rings\Enums\RingRelationshipsEnum;
use Domain\JewelleryProperties\Rings\Rings\Models\Ring;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class RingRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(Ring::class)
            ->allowedIncludes([
                RingRelationshipsEnum::JEWELLERY->value,
                RingRelationshipsEnum::RING_DETAILS->value,
                RingRelationshipsEnum::RING_FINGER->value,
                RingRelationshipsEnum::RING_METRICS->value,
                RingRelationshipsEnum::RING_TYPES->value,
                RingRelationshipsEnum::RING_SIZES->value,
            ])
            ->allowedFilters([
                AllowedFilter::exact(RingEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): Ring
    {
        return Ring::create($data);
    }

    public function show(array $data, int $id): Ring
    {
        return QueryBuilder::for(Ring::class)
            ->where(RingEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                RingRelationshipsEnum::JEWELLERY->value,
                RingRelationshipsEnum::RING_DETAILS->value,
                RingRelationshipsEnum::RING_FINGER->value,
                RingRelationshipsEnum::RING_METRICS->value,
                RingRelationshipsEnum::RING_TYPES->value,
                RingRelationshipsEnum::RING_SIZES->value,
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        Ring::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        Ring::findOrFail($id)->delete();
    }
}
