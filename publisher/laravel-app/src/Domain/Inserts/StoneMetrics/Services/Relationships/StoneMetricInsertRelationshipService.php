<?php

declare(strict_types=1);

namespace Domain\Inserts\StoneMetrics\Services\Relationships;

use Domain\Inserts\Inserts\Models\Insert;
use Domain\Inserts\StoneMetrics\Repositories\Relationships\StoneMetricInsertRelationshipRepository;

final class StoneMetricInsertRelationshipService
{
    public function __construct(public StoneMetricInsertRelationshipRepository $repository)
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