<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryBuilder\CategoryProps;

use Domain\Jewelleries\JewelleryBuilder\CategoryPropsBuilderInterface;
use Domain\Jewelleries\JewelleryBuilder\MetalPriceDifferentiationTrait;
use Domain\Jewelleries\JewelleryBuilder\SizePricePropsTrait;

final readonly class BroochProps implements CategoryPropsBuilderInterface
{
    use SizePricePropsTrait, MetalPriceDifferentiationTrait;

    public function __construct(private array $properties)
    {
    }

    public function getProps(): array
    {
        $properties = $this->properties;

        return [
            'quantity' => $this->getQuantity(),
            'price' => $this->getPriceDifferentiation($properties['prcsMetal']),
            'dimensions' => [
                'высота' => fake()->randomFloat(1, 3, 6) . ' см',
                'ширина' => fake()->randomFloat(1, 2, 4) . ' см',
                'толщина' => fake()->randomFloat(1, 1, 2) . ' мм',
            ],
        ];
    }
}
