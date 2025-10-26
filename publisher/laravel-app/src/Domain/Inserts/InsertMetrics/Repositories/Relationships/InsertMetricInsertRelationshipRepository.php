<?php

declare(strict_types=1);

namespace Domain\Inserts\InsertMetrics\Repositories\Relationships;

use Domain\Inserts\InsertMetrics\Models\InsertMetric;
use Domain\Inserts\Inserts\Models\Insert;

final class InsertMetricInsertRelationshipRepository
{
    public function index(int $id): Insert
    {
        return InsertMetric::findOrFail($id)->insert;
    }
}