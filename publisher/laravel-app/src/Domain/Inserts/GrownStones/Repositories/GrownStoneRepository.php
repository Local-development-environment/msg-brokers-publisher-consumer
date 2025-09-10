<?php

declare(strict_types=1);

namespace Domain\Inserts\GrownStones\Repositories;

use Domain\Inserts\GrownStones\Enums\GrownStoneEnum;
use Domain\Inserts\GrownStones\Enums\GrownStoneRelationshipsEnum;
use Domain\Inserts\GrownStones\Models\GrownStone;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class GrownStoneRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(GrownStone::class)
            ->allowedIncludes([
                GrownStoneRelationshipsEnum::STONE_FAMILY->value,
                GrownStoneRelationshipsEnum::STONE->value,
            ])
            ->allowedFilters([
                AllowedFilter::exact(GrownStoneEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): GrownStone
    {
        return GrownStone::create($data);
    }

    public function show(array $data, int $id): GrownStone
    {
        return QueryBuilder::for(GrownStone::class)
            ->where(GrownStoneEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                GrownStoneRelationshipsEnum::STONE_FAMILY->value,
                GrownStoneRelationshipsEnum::STONE->value,
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        GrownStone::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        GrownStone::findOrFail($id)->delete();
    }
}