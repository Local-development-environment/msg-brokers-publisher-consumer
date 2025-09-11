<?php

declare(strict_types=1);

namespace Domain\Inserts\InsertStones\Repositories;

use Domain\Inserts\InsertStones\Enums\InsertStoneRelationshipsEnum;
use Domain\Inserts\InsertStones\Models\InsertStone;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class InsertStoneRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(InsertStone::class)
            ->allowedIncludes([
                InsertStoneRelationshipsEnum::STONE->value,
                InsertStoneRelationshipsEnum::INSERTS->value,
                InsertStoneRelationshipsEnum::STONE_COLOUR->value,
                InsertStoneRelationshipsEnum::STONE_FACET->value
            ])
            ->allowedFilters([
                AllowedFilter::exact('id')
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): InsertStone
    {
        return InsertStone::create($data);
    }

    public function show(array $data, int $id): InsertStone
    {
        return QueryBuilder::for(InsertStone::class)
            ->where('id', $id)
            ->allowedIncludes([
                InsertStoneRelationshipsEnum::STONE->value,
                InsertStoneRelationshipsEnum::INSERTS->value,
                InsertStoneRelationshipsEnum::STONE_COLOUR->value,
                InsertStoneRelationshipsEnum::STONE_FACET->value
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        InsertStone::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        InsertStone::findOrFail($id)->delete();
    }
}