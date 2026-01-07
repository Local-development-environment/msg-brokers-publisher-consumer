<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Chains\ChainWeavings\Repositories;

use Domain\JewelleryProperties\Chains\ChainWeavings\Enums\ChainWeavingEnum;
use Domain\JewelleryProperties\Chains\ChainWeavings\Enums\ChainWeavingRelationshipsEnum;
use Domain\JewelleryProperties\Chains\ChainWeavings\Models\ChainWeaving;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class ChainWeavingRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(ChainWeaving::class)
            ->allowedIncludes([
                ChainWeavingRelationshipsEnum::WEAVING->value,
                ChainWeavingRelationshipsEnum::CHAIN->value,
            ])
            ->allowedFilters([
                AllowedFilter::exact(ChainWeavingEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): ChainWeaving
    {
        return ChainWeaving::create($data);
    }

    public function show(array $data, int $id): ChainWeaving
    {
        return QueryBuilder::for(ChainWeaving::class)
            ->where(ChainWeavingEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                ChainWeavingRelationshipsEnum::WEAVING->value,
                ChainWeavingRelationshipsEnum::CHAIN->value,
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        ChainWeaving::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        ChainWeaving::findOrFail($id)->delete();
    }
}
