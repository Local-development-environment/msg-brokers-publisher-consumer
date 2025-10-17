<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryBuilder;

use Illuminate\Support\Arr;

trait SizePricePropsTrait
{
    protected function getSizePrice(float $price, array $sizes): array
    {
        $tmp = [];
        foreach ($sizes as $size) {
            $priceSize = $price + ($price * (($size->value - 15) * 0.01));
            $tmp[] = ['size' => $size->value, 'price' => round($priceSize, -1), 'quantity' => rand(0, 10)];
        }

        return Arr::random($tmp, rand(3, count($sizes)));
    }

    protected function getQuantity(): int
    {
        return rand(0, 10);
    }
}
