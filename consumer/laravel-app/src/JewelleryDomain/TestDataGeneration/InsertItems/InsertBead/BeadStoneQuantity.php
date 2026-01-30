<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\InsertItems\InsertBead;

final readonly class BeadStoneQuantity
{
    public function __construct(private array $properties)
    {
    }

    public function getQuantity(array $dimensions): array|string
    {
        if (data_get($dimensions, 'diameter') !== null) {
            $dimension = data_get($dimensions, 'diameter');
        } else {
            $dimension = data_get($dimensions, 'width');
        }

        $sizes = array_flip(data_get($this->properties, 'property.metrics.*.size'));

        foreach ($sizes as $size => $quantity) {
            $sizes[$size] = round($size * 10/$dimension);
        }

        return $sizes;
    }
}
