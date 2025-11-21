<?php

declare(strict_types=1);

namespace Domain\Inserts\StoneExteriours\Repositories;

use Domain\Inserts\StoneExteriours\Enums\StoneExteriorEnum;
use Domain\Inserts\StoneExteriours\Enums\StoneExteriorRelationshipsEnum;
use Domain\Inserts\StoneExteriours\Models\StoneExterior;
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
                StoneExteriorRelationshipsEnum::COLOUR->value,
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
                StoneExteriorRelationshipsEnum::COLOUR->value,
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