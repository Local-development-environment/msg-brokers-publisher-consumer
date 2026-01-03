<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\BraceletSizes\Repositories\Relationships;

use Domain\JewelleryProperties\Bracelets\BraceletSizes\Models\BraceletSize;
use Illuminate\Database\Eloquent\Collection;

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
