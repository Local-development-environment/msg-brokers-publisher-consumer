<?php

declare(strict_types=1);

namespace Domain\Inserts\Stones\Repositories;

use Domain\Inserts\Stones\Enums\StoneRelationshipsEnum;
use Domain\Inserts\Stones\Models\Stone;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class StoneRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(Stone::class)
            ->allowedIncludes([
                StoneRelationshipsEnum::TYPE_ORIGIN->value,
                StoneRelationshipsEnum::IMITATION_STONE->value,
                StoneRelationshipsEnum::GROWN_STONE->value,
                StoneRelationshipsEnum::NATURAL_STONE->value
            ])
            ->allowedFilters([
                AllowedFilter::exact('id')
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): Stone
    {
        return Stone::create($data);
    }

    public function show(array $data, int $id): Stone
    {
        return QueryBuilder::for(Stone::class)
            ->where('id', $id)
            ->allowedIncludes([
                StoneRelationshipsEnum::TYPE_ORIGIN->value,
                StoneRelationshipsEnum::IMITATION_STONE->value,
                StoneRelationshipsEnum::GROWN_STONE->value,
                StoneRelationshipsEnum::NATURAL_STONE->value
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        Stone::find($id)->update($data);
    }

    public function destroy(int $id): void
    {
        Stone::findOrFail($id)->delete();
    }
}