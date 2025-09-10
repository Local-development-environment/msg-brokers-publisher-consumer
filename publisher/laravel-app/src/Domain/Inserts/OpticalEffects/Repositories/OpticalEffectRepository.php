<?php

declare(strict_types=1);

namespace Domain\Inserts\OpticalEffects\Repositories;

use Domain\Inserts\OpticalEffects\Enums\OpticalEffectEnum;
use Domain\Inserts\OpticalEffects\Enums\OpticalEffectRelationshipsEnum;
use Domain\Inserts\OpticalEffects\Models\OpticalEffect;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class OpticalEffectRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(OpticalEffect::class)
            ->allowedIncludes([OpticalEffectRelationshipsEnum::OPTICAL_EFFECT_STONES->value])
            ->allowedFilters([
                AllowedFilter::exact(OpticalEffectEnum::PRIMARY_KEY->value),
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): OpticalEffect
    {
        return OpticalEffect::create($data);
    }

    public function show(array $data, int $id): OpticalEffect
    {
        return QueryBuilder::for(OpticalEffect::class)
            ->where('id', $id)
            ->allowedIncludes([OpticalEffectRelationshipsEnum::OPTICAL_EFFECT_STONES->value])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        OpticalEffect::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        OpticalEffect::findOrFail($id)->delete();
    }
}