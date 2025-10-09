<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\Beads\Repositories;

use Domain\JewelleryProperties\Beads\Beads\Enums\BeadEnum;
use Domain\JewelleryProperties\Beads\Beads\Enums\BeadRelationshipsEnum;
use Domain\JewelleryProperties\Beads\Beads\Models\Bead;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class BeadRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(Bead::class)
            ->allowedIncludes([
                BeadRelationshipsEnum::BEAD_SIZES->value,
                BeadRelationshipsEnum::BEAD_METRICS->value,
                BeadRelationshipsEnum::BEAD_BASE->value,
                BeadRelationshipsEnum::JEWELLERY->value,
                BeadRelationshipsEnum::CLASP->value,
            ])
            ->allowedFilters([
                AllowedFilter::exact(BeadEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): Bead
    {
        return Bead::create($data);
    }

    public function show(array $data, int $id): Bead
    {
        return QueryBuilder::for(Bead::class)
            ->where(BeadEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                BeadRelationshipsEnum::BEAD_SIZES->value,
                BeadRelationshipsEnum::BEAD_METRICS->value,
                BeadRelationshipsEnum::BEAD_BASE->value,
                BeadRelationshipsEnum::JEWELLERY->value,
                BeadRelationshipsEnum::CLASP->value,
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        Bead::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        Bead::findOrFail($id)->delete();
    }
}