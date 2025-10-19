<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\BeadMetrics\Repositories;

use Domain\JewelleryProperties\Beads\BeadMetrics\Enums\BeadMetricEnum;
use Domain\JewelleryProperties\Beads\BeadMetrics\Enums\BeadMetricRelationshipsEnum;
use Domain\JewelleryProperties\Beads\BeadMetrics\Models\BeadMetric;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class BeadMetricRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(BeadMetric::class)
            ->allowedIncludes([
                BeadMetricRelationshipsEnum::BEAD->value,
                BeadMetricRelationshipsEnum::NECK_SIZE->value,
            ])
            ->allowedFilters([
                AllowedFilter::exact(BeadMetricEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): BeadMetric
    {
        return BeadMetric::create($data);
    }

    public function show(array $data, int $id): BeadMetric
    {
        return QueryBuilder::for(BeadMetric::class)
            ->where(BeadMetricEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                BeadMetricRelationshipsEnum::BEAD->value,
                BeadMetricRelationshipsEnum::NECK_SIZE->value,
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        BeadMetric::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        BeadMetric::findOrFail($id)->delete();
    }
}