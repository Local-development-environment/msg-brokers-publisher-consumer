<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Chains\ChainMetrics\Repositories;

use Domain\JewelleryProperties\Chains\ChainMetrics\Enums\ChainMetricEnum;
use Domain\JewelleryProperties\Chains\ChainMetrics\Enums\ChainMetricRelationshipsEnum;
use Domain\JewelleryProperties\Chains\ChainMetrics\Models\ChainMetric;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class ChainMetricRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(ChainMetric::class)
            ->allowedIncludes([
                ChainMetricRelationshipsEnum::NECK_SIZE->value,
                ChainMetricRelationshipsEnum::CHAIN->value,
            ])
            ->allowedFilters([
                AllowedFilter::exact(ChainMetricEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): ChainMetric
    {
        return ChainMetric::create($data);
    }

    public function show(array $data, int $id): ChainMetric
    {
        return QueryBuilder::for(ChainMetric::class)
            ->where(ChainMetricEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                ChainMetricRelationshipsEnum::NECK_SIZE->value,
                ChainMetricRelationshipsEnum::CHAIN->value,
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        ChainMetric::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        ChainMetric::findOrFail($id)->delete();
    }
}
