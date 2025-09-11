<?php

declare(strict_types=1);

namespace Domain\Inserts\Inserts\Services\Relationships;

use Domain\Inserts\Inserts\Repositories\Relationships\InsertStoneMetricRelationshipRepository;
use Domain\Inserts\StoneMetrics\Models\StoneMetric;

final class InsertStoneMetricRelationshipService
{
    public function __construct(public InsertStoneMetricRelationshipRepository $repository)
    {
    }

    public function index($id): StoneMetric
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}