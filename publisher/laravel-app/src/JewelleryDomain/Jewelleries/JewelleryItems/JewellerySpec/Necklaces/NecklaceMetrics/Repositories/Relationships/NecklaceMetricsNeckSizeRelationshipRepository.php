<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\NecklaceMetrics\Repositories\Relationships;

use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\NecklaceMetrics\Models\NecklaceMetric;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\NeckSizes\Models\NeckSize;

final class NecklaceMetricsNeckSizeRelationshipRepository
{
    public function index(int $id): NeckSize
    {
        return NecklaceMetric::findOrFail($id)->neckSize;
    }
}
