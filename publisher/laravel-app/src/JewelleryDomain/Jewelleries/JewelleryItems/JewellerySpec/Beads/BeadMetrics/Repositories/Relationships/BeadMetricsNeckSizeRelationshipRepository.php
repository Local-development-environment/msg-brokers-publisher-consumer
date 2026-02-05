<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\BeadMetrics\Repositories\Relationships;

use Domain\JewelleryProperties\Beads\BeadSizes\Models\BeadSize;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\BeadMetrics\Models\BeadMetric;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\NeckSizes\Models\NeckSize;

final class BeadMetricsNeckSizeRelationshipRepository
{
    public function index(int $id): NeckSize
    {
        return BeadMetric::findOrFail($id)->neckSize;
    }
}
