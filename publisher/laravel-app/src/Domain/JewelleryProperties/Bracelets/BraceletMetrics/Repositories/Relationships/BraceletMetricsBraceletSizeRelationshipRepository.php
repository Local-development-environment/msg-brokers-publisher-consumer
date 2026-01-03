<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\BraceletMetrics\Repositories\Relationships;

use Domain\JewelleryProperties\Bracelets\BraceletMetrics\Models\BraceletMetric;
use Domain\JewelleryProperties\Bracelets\BraceletSizes\Models\BraceletSize;

final class BraceletMetricsBraceletSizeRelationshipRepository
{
    public function index(int $id): BraceletSize
    {
        return BraceletMetric::findOrFail($id)->braceletSize;
    }

    public function update(array $data, int $id): void
    {

    }
}
