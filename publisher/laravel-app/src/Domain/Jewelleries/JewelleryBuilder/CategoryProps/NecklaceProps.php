<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryBuilder\CategoryProps;

use Domain\Jewelleries\JewelleryBuilder\CategoryPropsBuilderInterface;
use Domain\Jewelleries\JewelleryBuilder\MetalPriceDifferentiationTrait;
use Domain\Jewelleries\JewelleryBuilder\SizePricePropsTrait;
use Domain\Shared\JewelleryProperties\Clasps\Enums\ClaspListEnum;
use Domain\Shared\JewelleryProperties\NeckSizes\Enums\NeckSizeListEnum;

final readonly class NecklaceProps implements CategoryPropsBuilderInterface
{
    use SizePricePropsTrait, MetalPriceDifferentiationTrait;

    public function __construct(private array $properties)
    {
    }

    public function getProps(): array
    {
        $metal = $this->properties['metalType'];
        $insert = $this->properties['insert'];

        $sizePrices = $this->getSizePrice($this->getPriceDifferentiation($metal), NeckSizeListEnum::cases());

        return [
            'size_price_quantity' => $sizePrices,
            'clasp' => ClaspListEnum::cases()[array_rand(ClaspListEnum::cases())]->value,
            'necklace_sizes' => data_get($sizePrices, '*.size'),
            'quantity' => data_get($sizePrices, '*.quantity'),
            'price' => data_get($sizePrices, '*.price')
        ];
    }
}
