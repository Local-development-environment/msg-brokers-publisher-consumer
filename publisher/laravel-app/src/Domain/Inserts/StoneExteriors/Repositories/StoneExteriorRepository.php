<?php

declare(strict_types=1);

namespace Domain\Inserts\StoneExteriors\Repositories;

use Domain\Inserts\StoneExteriors\Enums\StoneExteriorEnum;
use Domain\Inserts\StoneExteriors\Enums\StoneExteriorRelationshipsEnum;
use Domain\Inserts\StoneExteriors\Models\StoneExterior;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class StoneExteriorRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(StoneExterior::class)
            ->allowedIncludes([
                StoneExteriorRelationshipsEnum::STONE->value,
                StoneExteriorRelationshipsEnum::INSERTS->value,
                StoneExteriorRelationshipsEnum::STONE_COLOUR->value,
                StoneExteriorRelationshipsEnum::FACET->value
            ])
            ->allowedFilters([
                AllowedFilter::exact(StoneExteriorEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): StoneExterior
    {
        return StoneExterior::create($data);
    }

    public function show(array $data, int $id): StoneExterior
    {
        return QueryBuilder::for(StoneExterior::class)
            ->where(StoneExteriorEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                StoneExteriorRelationshipsEnum::STONE->value,
                StoneExteriorRelationshipsEnum::INSERTS->value,
                StoneExteriorRelationshipsEnum::STONE_COLOUR->value,
                StoneExteriorRelationshipsEnum::FACET->value
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        StoneExterior::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        StoneExterior::findOrFail($id)->delete();
    }
}
