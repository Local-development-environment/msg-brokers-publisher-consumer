<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletMetrics\Repositories\Relationships;

use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletMetrics\Models\BraceletMetric;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\Bracelets\Models\Bracelet;

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
