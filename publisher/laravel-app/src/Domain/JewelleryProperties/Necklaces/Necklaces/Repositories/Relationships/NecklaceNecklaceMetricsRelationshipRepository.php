<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Necklaces\Necklaces\Repositories\Relationships;

use Domain\JewelleryProperties\Necklaces\Necklaces\Models\Necklace;
use Illuminate\Database\Eloquent\Collection;

final class NecklaceNecklaceMetricsRelationshipRepository
{
    public function index(int $id): Collection
    {
        return Necklace::findOrFail($id)->necklaceMetrics;
    }
}