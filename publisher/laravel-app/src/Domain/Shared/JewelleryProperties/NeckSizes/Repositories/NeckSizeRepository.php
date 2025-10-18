<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\NeckSizes\Repositories;

use Domain\Shared\JewelleryProperties\NeckSizes\Enums\NeckSizeEnum;
use Domain\Shared\JewelleryProperties\NeckSizes\Enums\NeckSizeRelationshipsEnum;
use Domain\Shared\JewelleryProperties\NeckSizes\Models\NeckSize;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class NeckSizeRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(NeckSize::class)
            ->allowedIncludes([
                NeckSizeRelationshipsEnum::LENGTH_NAME->value,
                NeckSizeRelationshipsEnum::BEAD_METRICS->value,
                NeckSizeRelationshipsEnum::BEADS->value,
                NeckSizeRelationshipsEnum::CHAINS->value,
                NeckSizeRelationshipsEnum::NECKLACES->value,
            ])
            ->allowedFilters([
                AllowedFilter::exact(NeckSizeEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): NeckSize
    {
        return NeckSize::create($data);
    }

    public function show(array $data, int $id): NeckSize
    {
        return QueryBuilder::for(NeckSize::class)
            ->where(NeckSizeEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                NeckSizeRelationshipsEnum::LENGTH_NAME->value,
                NeckSizeRelationshipsEnum::BEAD_METRICS->value,
                NeckSizeRelationshipsEnum::BEADS->value,
                NeckSizeRelationshipsEnum::CHAINS->value,
                NeckSizeRelationshipsEnum::NECKLACES->value,
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        NeckSize::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        NeckSize::findOrFail($id)->delete();
    }
}