<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\Properties\Earrings;

use Domain\JewelleryGenerator\CategoryPropsBuilderInterface;
use Domain\JewelleryGenerator\Traits\MetalPriceDifferentiationTrait;
use Domain\JewelleryGenerator\Traits\SizePricePropsTrait;

final readonly class EarringProps implements CategoryPropsBuilderInterface
{
    use SizePricePropsTrait, MetalPriceDifferentiationTrait;

    public function __construct(private array $properties)
    {
    }

    public function getProps(): array
    {
        $properties = $this->properties;
        $clasps = config('data-seed.data_items.earring_clasps');
        $types = config('data-seed.data_items.earring_types');

        return [
            'quantity' => $this->getQuantity(),
            'price' => $this->getPriceDifferentiation($properties['metalType']),
            'dimensions' => [
                'высота' => fake()->randomFloat(1, 3, 6) . ' см',
                'ширина' => fake()->randomFloat(1, 2, 4) . ' см',
            ],
            'clasp' => $clasps[array_rand($clasps, 1)],
            'earring_type' => $types[array_rand($types, 1)],
        ];
    }
}
