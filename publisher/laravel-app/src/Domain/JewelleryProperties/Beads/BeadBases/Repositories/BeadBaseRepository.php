<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\BeadBases\Repositories;

use Domain\JewelleryProperties\Beads\BeadBases\Enums\BeadBaseEnum;
use Domain\JewelleryProperties\Beads\BeadBases\Enums\BeadBaseRelationshipsEnum;
use Domain\JewelleryProperties\Beads\BeadBases\Models\BeadBase;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class BeadBaseRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(BeadBase::class)
            ->allowedIncludes([
                BeadBaseRelationshipsEnum::BEADS->value,
                BeadBaseRelationshipsEnum::CLASPS->value,
            ])
            ->allowedFilters([
                AllowedFilter::exact(BeadBaseEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): BeadBase
    {
        return BeadBase::create($data);
    }

    public function show(array $data, int $id): BeadBase
    {
        return QueryBuilder::for(BeadBase::class)
            ->where(BeadBaseEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                BeadBaseRelationshipsEnum::BEADS->value,
                BeadBaseRelationshipsEnum::CLASPS->value,
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        BeadBase::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        BeadBase::findOrFail($id)->delete();
    }
}