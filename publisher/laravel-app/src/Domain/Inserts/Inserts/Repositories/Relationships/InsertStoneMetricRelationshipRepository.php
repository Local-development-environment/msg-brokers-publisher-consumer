<?php

declare(strict_types=1);

namespace Domain\Inserts\Inserts\Repositories\Relationships;

use Domain\Inserts\Inserts\Models\Insert;
use Domain\Inserts\StoneMetrics\Models\StoneMetric;

final class InsertStoneMetricRelationshipRepository
{
    public function index(int $id): StoneMetric
    {
        return Insert::findOrFail($id)->stoneMetric;
    }
}