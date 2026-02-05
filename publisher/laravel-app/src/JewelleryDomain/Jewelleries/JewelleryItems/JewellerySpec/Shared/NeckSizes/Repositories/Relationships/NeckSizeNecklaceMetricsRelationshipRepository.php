<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\NeckSizes\Repositories\Relationships;

use Illuminate\Database\Eloquent\Collection;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\NeckSizes\Models\NeckSize;

final class NeckSizeNecklaceMetricsRelationshipRepository
{
    public function index(int $id): Collection
    {
        return NeckSize::findOrFail($id)->necklaceMetrics;
    }
}
