<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Necklaces\NecklaceMetrics\Repositories\Relationships;

use Domain\JewelleryProperties\Necklaces\NecklaceMetrics\Models\NecklaceMetric;
use Domain\Shared\JewelleryProperties\NeckSizes\Models\NeckSize;

final class NecklaceMetricsNeckSizeRelationshipRepository
{
    public function index(int $id): NeckSize
    {
        return NecklaceMetric::findOrFail($id)->neckSize;
    }
}