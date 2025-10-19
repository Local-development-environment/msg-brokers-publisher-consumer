<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Necklaces\NecklaceMetrics\Repositories;

use Domain\JewelleryProperties\Necklaces\NecklaceMetrics\Enums\NecklaceMetricEnum;
use Domain\JewelleryProperties\Necklaces\NecklaceMetrics\Enums\NecklaceMetricRelationshipsEnum;
use Domain\JewelleryProperties\Necklaces\NecklaceMetrics\Models\NecklaceMetric;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class NecklaceMetricRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(NecklaceMetric::class)
            ->allowedIncludes([
                NecklaceMetricRelationshipsEnum::NECKLACE->value,
                NecklaceMetricRelationshipsEnum::NECK_SIZE->value,
            ])
            ->allowedFilters([
                AllowedFilter::exact(NecklaceMetricEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): NecklaceMetric
    {
        return NecklaceMetric::create($data);
    }

    public function show(array $data, int $id): NecklaceMetric
    {
        return QueryBuilder::for(NecklaceMetric::class)
            ->where(NecklaceMetricEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                NecklaceMetricRelationshipsEnum::NECKLACE->value,
                NecklaceMetricRelationshipsEnum::NECK_SIZE->value,
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        NecklaceMetric::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        NecklaceMetric::findOrFail($id)->delete();
    }
}