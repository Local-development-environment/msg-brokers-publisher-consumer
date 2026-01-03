<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\BraceletMetrics\Repositories\Relationships;

use Domain\JewelleryProperties\Bracelets\BraceletMetrics\Models\BraceletMetric;
use Domain\JewelleryProperties\Bracelets\Bracelets\Models\Bracelet;

final class BraceletMetricsBraceletRelationshipRepository
{
    public function index(int $id): Bracelet
    {
        return BraceletMetric::findOrFail($id)->bracelet;
    }

    public function update(array $data, int $id): void
    {

    }
}
