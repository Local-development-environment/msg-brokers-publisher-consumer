<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\Bracelets\Repositories\Relationships;

use Domain\JewelleryProperties\Bracelets\BraceletMetrics\Models\BraceletMetric;
use Domain\JewelleryProperties\Bracelets\Bracelets\Models\Bracelet;
use Illuminate\Database\Eloquent\Collection;

final class BraceletBraceletMetricsRelationshipRepository
{
    public function index(int $id): Collection
    {
        return Bracelet::findOrFail($id)->braceletMetrics;
    }

    public function store(array $data): void
    {
        foreach ($data as $item) {
            BraceletMetric::insert([
//                'bead_id' => $item['bead_id'],
//                'neck_size_id' => $item['neck_size_id'],
//                'quantity' => $item['quantity'],
//                'price' => $item['price'],
//                'created_at' => now(),
            ]);
        }
    }
}
