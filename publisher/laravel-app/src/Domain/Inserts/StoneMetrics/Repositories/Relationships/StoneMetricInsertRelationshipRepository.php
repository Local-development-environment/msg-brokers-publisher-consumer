<?php

declare(strict_types=1);

namespace Domain\Inserts\StoneMetrics\Repositories\Relationships;

use Domain\Inserts\Inserts\Models\Insert;
use Domain\Inserts\StoneMetrics\Models\StoneMetric;

final class StoneMetricInsertRelationshipRepository
{
    public function index(int $id): Insert
    {
        return StoneMetric::findOrFail($id)->insert;
    }
}