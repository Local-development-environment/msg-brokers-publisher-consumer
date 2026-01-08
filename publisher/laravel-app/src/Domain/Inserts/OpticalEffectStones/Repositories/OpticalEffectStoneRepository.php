<?php

declare(strict_types=1);

namespace Domain\Inserts\OpticalEffectStones\Repositories;

use Domain\Inserts\OpticalEffectStones\Enums\StoneOpticalEffectEnum;
use Domain\Inserts\OpticalEffectStones\Enums\StoneOpticalEffectRelationshipsEnum;
use Domain\Inserts\OpticalEffectStones\Models\StoneOpticalEffect;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class OpticalEffectStoneRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(StoneOpticalEffect::class)
            ->allowedIncludes([
                StoneOpticalEffectRelationshipsEnum::OPTICAL_EFFECT->value,
                StoneOpticalEffectRelationshipsEnum::STONE->value
            ])
            ->allowedFilters([
                AllowedFilter::exact(StoneOpticalEffectEnum::PRIMARY_KEY->value),
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): StoneOpticalEffect
    {
        return StoneOpticalEffect::create($data);
    }

    public function show(array $data, int $id): StoneOpticalEffect
    {
        return QueryBuilder::for(StoneOpticalEffect::class)
            ->where(StoneOpticalEffectEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                StoneOpticalEffectRelationshipsEnum::OPTICAL_EFFECT->value,
                StoneOpticalEffectRelationshipsEnum::STONE->value
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        StoneOpticalEffect::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        StoneOpticalEffect::findOrFail($id)->delete();
    }
}
