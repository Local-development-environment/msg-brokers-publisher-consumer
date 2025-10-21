<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Necklaces\Necklaces\Repositories\Relationships;

use Domain\JewelleryProperties\Necklaces\NecklaceMetrics\Models\NecklaceMetric;
use Domain\JewelleryProperties\Necklaces\Necklaces\Models\Necklace;
use Illuminate\Database\Eloquent\Collection;

final class NecklaceNecklaceMetricsRelationshipRepository
{
    public function index(int $id): Collection
    {
        return Necklace::findOrFail($id)->necklaceMetrics;
    }

    public function store(array $data): void
    {
//        dd($data);
        foreach ($data as $item) {
            NecklaceMetric::insert([
                'necklace_id' => $item['necklace_id'],
                'neck_size_id' => $item['neck_size_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'created_at' => now(),
            ]);
        }
    }
}