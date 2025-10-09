<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\BeadMetrics\Repositories\Relationships;

use Domain\JewelleryProperties\Beads\BeadMetrics\Models\BeadMetric;
use Domain\JewelleryProperties\Beads\Beads\Models\Bead;

final class BeadMetricsBeadSizeRelationshipRepository
{
    public function index(int $id): Bead
    {
        return BeadMetric::findOrFail($id)->bead;
    }

    public function update(array $data, int $id): void
    {

    }
}