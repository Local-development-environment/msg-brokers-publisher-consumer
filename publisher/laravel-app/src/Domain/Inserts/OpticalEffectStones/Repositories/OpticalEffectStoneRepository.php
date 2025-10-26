<?php

declare(strict_types=1);

namespace Domain\Inserts\OpticalEffectStones\Repositories;

use Domain\Inserts\OpticalEffectStones\Enums\OpticalEffectStoneEnum;
use Domain\Inserts\OpticalEffectStones\Enums\OpticalEffectStoneRelationshipsEnum;
use Domain\Inserts\OpticalEffectStones\Models\OpticalEffectStone;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class OpticalEffectStoneRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(OpticalEffectStone::class)
            ->allowedIncludes([
                OpticalEffectStoneRelationshipsEnum::OPTICAL_EFFECT->value,
                OpticalEffectStoneRelationshipsEnum::STONE->value
            ])
            ->allowedFilters([
                AllowedFilter::exact(OpticalEffectStoneEnum::PRIMARY_KEY->value),
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): OpticalEffectStone
    {
        return OpticalEffectStone::create($data);
    }

    public function show(array $data, int $id): OpticalEffectStone
    {
        return QueryBuilder::for(OpticalEffectStone::class)
            ->where(OpticalEffectStoneEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                OpticalEffectStoneRelationshipsEnum::OPTICAL_EFFECT->value,
                OpticalEffectStoneRelationshipsEnum::STONE->value
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        OpticalEffectStone::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        OpticalEffectStone::findOrFail($id)->delete();
    }
}