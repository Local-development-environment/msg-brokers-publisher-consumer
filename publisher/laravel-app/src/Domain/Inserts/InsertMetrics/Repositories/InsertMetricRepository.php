<?php

declare(strict_types=1);

namespace Domain\Inserts\InsertMetrics\Repositories;

use Domain\Inserts\InsertMetrics\Enums\InsertMetricEnum;
use Domain\Inserts\InsertMetrics\Enums\InsertMetricRelationshipsEnum;
use Domain\Inserts\InsertMetrics\Models\InsertMetric;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class InsertMetricRepository
{
    public function index(array $data): Paginator
    {
        return QueryBuilder::for(InsertMetric::class)
            ->allowedIncludes([InsertMetricRelationshipsEnum::INSERT->value])
            ->allowedFilters([
                AllowedFilter::exact(InsertMetricEnum::PRIMARY_KEY->value),
            ])
            ->paginate($data['per_page'] ?? null)
            ->appends($data);
    }

    public function store(array $data): InsertMetric
    {
        return InsertMetric::create($data);
    }

    public function show(array $data, int $id): InsertMetric
    {
        return QueryBuilder::for(InsertMetric::class)
            ->where(InsertMetricEnum::PRIMARY_KEY->value, $id)
            ->allowedIncludes([InsertMetricRelationshipsEnum::INSERT->value])
            ->firstOrFail();
    }

    public function update(array $data, int $id): void
    {
        InsertMetric::findOrFail($id)->update($data);
    }

    public function destroy(int $id): void
    {
        InsertMetric::findOrFail($id)->delete();
    }
}