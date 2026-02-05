<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\Necklaces\Repositories\Relationships;

use Illuminate\Database\Eloquent\Collection;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\NecklaceMetrics\Models\NecklaceMetric;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\Necklaces\Models\Necklace;

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
