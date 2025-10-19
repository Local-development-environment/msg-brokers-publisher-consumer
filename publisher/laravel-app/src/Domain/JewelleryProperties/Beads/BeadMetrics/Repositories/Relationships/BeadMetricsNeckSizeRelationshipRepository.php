<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\BeadMetrics\Repositories\Relationships;

use Domain\JewelleryProperties\Beads\BeadMetrics\Models\BeadMetric;
use Domain\JewelleryProperties\Beads\BeadSizes\Models\BeadSize;
use Domain\Shared\JewelleryProperties\NeckSizes\Models\NeckSize;

final class BeadMetricsNeckSizeRelationshipRepository
{
    public function index(int $id): NeckSize
    {
        return BeadMetric::findOrFail($id)->neckSize;
    }
}