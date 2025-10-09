<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\BeadMetrics\Repositories\Relationships;

use Domain\JewelleryProperties\Beads\BeadMetrics\Models\BeadMetric;
use Domain\JewelleryProperties\Beads\BeadSizes\Models\BeadSize;

final class BeadMetricsBeadRelationshipRepository
{
    public function index(int $id): BeadSize
    {
        return BeadMetric::findOrFail($id)->beadSize;
    }

    public function update(array $data, int $id): void
    {

    }
}