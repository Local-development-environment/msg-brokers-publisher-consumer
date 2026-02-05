<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingMetrics\Repositories;

use Illuminate\Contracts\Pagination\Paginator;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingMetrics\Enums\RingMetricEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingMetrics\Enums\RingMetricRelationshipsEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingMetrics\Models\RingMetric;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class RingMetricRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(RingMetric::class)
            ->allowedIncludes([
                RingMetricRelationshipsEnum::RING->value,
                RingMetricRelationshipsEnum::RING_SIZE->value,
            ])
            ->allowedFilters([
                AllowedFilter::exact(RingMetricEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): RingMetric
    {
        return RingMetric::create($data);
    }

    public function show(array $data, int $id): RingMetric
    {
        return QueryBuilder::for(RingMetric::class)
            ->where(RingMetricEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                RingMetricRelationshipsEnum::RING->value,
                RingMetricRelationshipsEnum::RING_SIZE->value,
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        RingMetric::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        RingMetric::findOrFail($id)->delete();
    }
}
