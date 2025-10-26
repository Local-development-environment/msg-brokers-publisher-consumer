<?php

declare(strict_types=1);

namespace Domain\Inserts\Inserts\Repositories\Relationships;

use Domain\Inserts\InsertMetrics\Models\InsertMetric;
use Domain\Inserts\Inserts\Models\Insert;

final class InsertInsertMetricRelationshipRepository
{
    public function index(int $id): InsertMetric
    {
        return Insert::findOrFail($id)->insertMetric;
    }
}