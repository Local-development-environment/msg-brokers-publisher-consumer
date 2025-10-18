<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\Beads\Repositories\Relationships;

use Domain\JewelleryProperties\Beads\BeadMetrics\Models\BeadMetric;
use Domain\JewelleryProperties\Beads\Beads\Models\Bead;
use Illuminate\Database\Eloquent\Collection;

final class BeadBeadMetricsRelationshipRepository
{
    public function index(int $id): Collection
    {
        return Bead::findOrFail($id)->beadMetrics;
    }

    public function store(array $data): void
    {
        foreach ($data as $item) {
            BeadMetric::insert([
                'bead_id' => $item['bead_id'],
                'bead_size_id' => $item['bead_size_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'created_at' => now(),
            ]);
        }
    }
}