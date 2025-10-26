<?php

declare(strict_types=1);

namespace Domain\Inserts\ImitationStones\Repositories;

use Domain\Inserts\ImitationStones\Enums\ImitationStoneEnum;
use Domain\Inserts\ImitationStones\Enums\ImitationStoneRelationshipsEnum;
use Domain\Inserts\ImitationStones\Models\ImitationStone;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class ImitationStoneRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(ImitationStone::class)
            ->allowedIncludes([
                ImitationStoneRelationshipsEnum::STONE->value
            ])
            ->allowedFilters([
                AllowedFilter::exact(ImitationStoneEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): ImitationStone
    {
        return ImitationStone::create($data);
    }

    public function show(array $data, int $id): ImitationStone
    {
        return QueryBuilder::for(ImitationStone::class)
            ->where(ImitationStoneEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                ImitationStoneRelationshipsEnum::STONE->value
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        ImitationStone::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        ImitationStone::findOrFail($id)->delete();
    }
}