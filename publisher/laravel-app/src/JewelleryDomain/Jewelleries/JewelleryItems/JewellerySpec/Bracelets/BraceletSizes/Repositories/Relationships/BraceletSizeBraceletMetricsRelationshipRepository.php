<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletSizes\Repositories\Relationships;

use Illuminate\Database\Eloquent\Collection;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletSizes\Models\BraceletSize;

final class BraceletSizeBraceletMetricsRelationshipRepository
{
    public function index(int $id): Collection
    {
        return BraceletSize::findOrFail($id)->braceletMetrics;
    }

    public function update(array $data, int $id): void
    {

    }
}
