<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\Beads\Repositories\Relationships;

use Illuminate\Database\Eloquent\Collection;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\BeadMetrics\Models\BeadMetric;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\Beads\Models\Bead;

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
                'neck_size_id' => $item['neck_size_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'created_at' => now(),
            ]);
        }
    }
}
