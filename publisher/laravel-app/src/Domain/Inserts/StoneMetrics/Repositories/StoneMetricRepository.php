<?php

declare(strict_types=1);

namespace Domain\Inserts\StoneMetrics\Repositories;

use Domain\Inserts\StoneMetrics\Enums\StoneMetricEnum;
use Domain\Inserts\StoneMetrics\Enums\StoneMetricRelationshipsEnum;
use Domain\Inserts\StoneMetrics\Models\StoneMetric;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class StoneMetricRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(StoneMetric::class)
            ->allowedIncludes([StoneMetricRelationshipsEnum::INSERT->value])
            ->allowedFilters([
                AllowedFilter::exact(StoneMetricEnum::PRIMARY_KEY->value),
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): StoneMetric
    {
        return StoneMetric::create($data);
    }

    public function show(array $data, int $id): StoneMetric
    {
        return QueryBuilder::for(StoneMetric::class)
            ->where('id', $id)
            ->allowedIncludes([StoneMetricRelationshipsEnum::INSERT->value])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        StoneMetric::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        StoneMetric::findOrFail($id)->delete();
    }
}