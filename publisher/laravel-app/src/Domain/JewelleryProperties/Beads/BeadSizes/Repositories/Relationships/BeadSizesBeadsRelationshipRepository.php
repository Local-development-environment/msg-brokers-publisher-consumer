<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\BeadSizes\Repositories\Relationships;

use Domain\JewelleryProperties\Beads\BeadSizes\Models\BeadSize;
use Illuminate\Database\Eloquent\Collection;

final class BeadSizesBeadsRelationshipRepository
{
    public function index(int $id): Collection
    {
        return BeadSize::findOrFail($id)->beadMetrics;
    }

    public function update(array $data, int $id): void
    {

    }
}