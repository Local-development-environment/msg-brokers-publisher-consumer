<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Necklaces\NecklaceMetrics\Repositories\Relationships;

use Domain\JewelleryProperties\Necklaces\NecklaceMetrics\Models\NecklaceMetric;
use Domain\JewelleryProperties\Necklaces\Necklaces\Models\Necklace;

final class NecklaceMetricsNecklaceRelationshipRepository
{
    public function index(int $id): Necklace
    {
        return NecklaceMetric::findOrFail($id)->necklace;
    }
}