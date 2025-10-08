<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\BeadSizes\Repositories;

use Domain\JewelleryProperties\Beads\BeadSizes\Enums\BeadSizeEnum;
use Domain\JewelleryProperties\Beads\BeadSizes\Enums\BeadSizeRelationshipsEnum;
use Domain\JewelleryProperties\Beads\BeadSizes\Models\BeadSize;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class BeadSizeRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(BeadSize::class)
            ->allowedIncludes([
                BeadSizeRelationshipsEnum::LENGTH_NAME->value,
                BeadSizeRelationshipsEnum::BEAD_METRICS->value,
                BeadSizeRelationshipsEnum::BEADS->value,
            ])
            ->allowedFilters([
                AllowedFilter::exact(BeadSizeEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): BeadSize
    {
        return BeadSize::create($data);
    }

    public function show(array $data, int $id): BeadSize
    {
        return QueryBuilder::for(BeadSize::class)
            ->where(BeadSizeEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                BeadSizeRelationshipsEnum::LENGTH_NAME->value,
                BeadSizeRelationshipsEnum::BEAD_METRICS->value,
                BeadSizeRelationshipsEnum::BEADS->value,
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        BeadSize::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        BeadSize::findOrFail($id)->delete();
    }
}