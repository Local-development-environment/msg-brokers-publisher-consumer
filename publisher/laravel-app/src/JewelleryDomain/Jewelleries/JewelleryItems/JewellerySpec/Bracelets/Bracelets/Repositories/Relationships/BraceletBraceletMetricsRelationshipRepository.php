<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\Bracelets\Repositories\Relationships;

use Illuminate\Database\Eloquent\Collection;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletMetrics\Models\BraceletMetric;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\Bracelets\Models\Bracelet;

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
