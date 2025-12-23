<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\Properties\Piercings;

use Domain\JewelleryGenerator\CategoryPropsBuilderInterface;
use Domain\JewelleryGenerator\Traits\MetalPriceDifferentiationTrait;
use Domain\JewelleryGenerator\Traits\SizePricePropsTrait;

final readonly class PiercingProps implements CategoryPropsBuilderInterface
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
            'price' => $this->getPriceDifferentiation($properties['metalItem']['preciousMetals'][0]['preciousMetal']),
        ];
    }
}
