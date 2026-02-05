<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletMetrics\Repositories\Relationships;

use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletMetrics\Models\BraceletMetric;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletSizes\Models\BraceletSize;

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
