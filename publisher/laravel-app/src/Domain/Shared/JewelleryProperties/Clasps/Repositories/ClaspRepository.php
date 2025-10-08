<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\Clasps\Repositories;

use Domain\Shared\JewelleryProperties\Clasps\Enums\ClaspEnum;
use Domain\Shared\JewelleryProperties\Clasps\Enums\ClaspRelationshipsEnum;
use Domain\Shared\JewelleryProperties\Clasps\Models\Clasp;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class ClaspRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(Clasp::class)
            ->allowedIncludes([
                ClaspRelationshipsEnum::BEADS->value,
                ClaspRelationshipsEnum::BEAD_BASES->value,
            ])
            ->allowedFilters([
                AllowedFilter::exact(ClaspEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): Clasp
    {
        return Clasp::create($data);
    }

    public function show(array $data, int $id): Clasp
    {
        return QueryBuilder::for(Clasp::class)
            ->where(ClaspEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                ClaspRelationshipsEnum::BEADS->value,
                ClaspRelationshipsEnum::BEAD_BASES->value,
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        Clasp::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        Clasp::findOrFail($id)->delete();
    }
}