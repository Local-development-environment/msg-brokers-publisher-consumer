<?php

declare(strict_types=1);

namespace Domain\Inserts\InsertExteriors\Repositories;

use Domain\Inserts\InsertExteriors\Enums\InsertExteriorEnum;
use Domain\Inserts\InsertExteriors\Enums\InsertExteriorRelationshipsEnum;
use Domain\Inserts\InsertExteriors\Models\InsertExterior;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class InsertExteriorRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(InsertExterior::class)
            ->allowedIncludes([
                InsertExteriorRelationshipsEnum::STONE->value,
                InsertExteriorRelationshipsEnum::INSERTS->value,
                InsertExteriorRelationshipsEnum::COLOUR->value,
                InsertExteriorRelationshipsEnum::FACET->value
            ])
            ->allowedFilters([
                AllowedFilter::exact(InsertExteriorEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): InsertExterior
    {
        return InsertExterior::create($data);
    }

    public function show(array $data, int $id): InsertExterior
    {
        return QueryBuilder::for(InsertExterior::class)
            ->where(InsertExteriorEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                InsertExteriorRelationshipsEnum::STONE->value,
                InsertExteriorRelationshipsEnum::INSERTS->value,
                InsertExteriorRelationshipsEnum::COLOUR->value,
                InsertExteriorRelationshipsEnum::FACET->value
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        InsertExterior::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        InsertExterior::findOrFail($id)->delete();
    }
}