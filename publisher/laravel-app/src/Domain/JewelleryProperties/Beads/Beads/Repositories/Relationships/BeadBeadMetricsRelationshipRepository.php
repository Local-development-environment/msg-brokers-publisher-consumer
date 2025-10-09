<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\Beads\Repositories\Relationships;

use Domain\JewelleryProperties\Beads\Beads\Models\Bead;
use Illuminate\Database\Eloquent\Collection;

final class BeadBeadMetricsRelationshipRepository
{
    public function index(int $id): Collection
    {
        return Bead::findOrFail($id)->beadMetrics;
    }

    public function update(array $data, int $id): void
    {

    }
}