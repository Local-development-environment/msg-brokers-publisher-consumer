<?php

declare(strict_types=1);

namespace Domain\Inserts\Inserts\Services\Relationships;

use Domain\Inserts\InsertMetrics\Models\InsertMetric;
use Domain\Inserts\Inserts\Repositories\Relationships\InsertInsertMetricRelationshipRepository;

final class InsertInsertMetricRelationshipService
{
    public function __construct(public InsertInsertMetricRelationshipRepository $repository)
    {
    }

    public function index($id): InsertMetric
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}