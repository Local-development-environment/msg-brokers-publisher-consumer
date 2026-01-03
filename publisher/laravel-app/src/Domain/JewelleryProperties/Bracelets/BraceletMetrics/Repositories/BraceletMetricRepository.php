<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\BraceletMetrics\Repositories;

use Domain\JewelleryProperties\Bracelets\BraceletMetrics\Enums\BraceletMetricEnum;
use Domain\JewelleryProperties\Bracelets\BraceletMetrics\Enums\BraceletMetricRelationshipsEnum;
use Domain\JewelleryProperties\Bracelets\BraceletMetrics\Models\BraceletMetric;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class BraceletMetricRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(BraceletMetric::class)
            ->allowedIncludes([
                BraceletMetricRelationshipsEnum::BRACELET->value,
                BraceletMetricRelationshipsEnum::BRACELET_SIZE->value,
            ])
            ->allowedFilters([
                AllowedFilter::exact(BraceletMetricEnum::PRIMARY_KEY->value)
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): BraceletMetric
    {
        return BraceletMetric::create($data);
    }

    public function show(array $data, int $id): BraceletMetric
    {
        return QueryBuilder::for(BraceletMetric::class)
            ->where(BraceletMetricEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([
                BraceletMetricRelationshipsEnum::BRACELET->value,
                BraceletMetricRelationshipsEnum::BRACELET_SIZE->value,
            ])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        BraceletMetric::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        BraceletMetric::findOrFail($id)->delete();
    }
}
