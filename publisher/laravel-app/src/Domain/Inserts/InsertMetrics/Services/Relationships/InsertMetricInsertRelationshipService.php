<?php

declare(strict_types=1);

namespace Domain\Inserts\InsertMetrics\Services\Relationships;

use Domain\Inserts\InsertMetrics\Repositories\Relationships\InsertMetricInsertRelationshipRepository;
use Domain\Inserts\Inserts\Models\Insert;

final class InsertMetricInsertRelationshipService
{
    public function __construct(public InsertMetricInsertRelationshipRepository $repository)
    {
    }

    public function index($id): Insert
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}