<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Chains\Chains\Repositories;

use Domain\JewelleryProperties\Chains\Chains\Enums\ChainEnum;
use Domain\JewelleryProperties\Chains\Chains\Enums\ChainRelationshipsEnum;
use Domain\JewelleryProperties\Chains\Chains\Models\Chain;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class ChainRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(Chain::class)
            ->allowedIncludes([
                ChainRelationshipsEnum::NECK_SIZES->value,
                ChainRelationshipsEnum::CHAIN_METRICS->value,
                ChainRelationshipsEnum::CHAIN_WEAVING->value,
                ChainRelationshipsEnum::JEWELLERY->value,
                ChainRelationshipsEnum::CLASP->value,
            ])
            ->allowedFilters([
                AllowedFilter::exact(ChainEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): Chain
    {
        return Chain::create($data);
    }

    public function show(array $data, int $id): Chain
    {
        return QueryBuilder::for(Chain::class)
            ->where(ChainEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                ChainRelationshipsEnum::NECK_SIZES->value,
                ChainRelationshipsEnum::CHAIN_METRICS->value,
                ChainRelationshipsEnum::CHAIN_WEAVING->value,
                ChainRelationshipsEnum::JEWELLERY->value,
                ChainRelationshipsEnum::CLASP->value,
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        Chain::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        Chain::findOrFail($id)->delete();
    }
}