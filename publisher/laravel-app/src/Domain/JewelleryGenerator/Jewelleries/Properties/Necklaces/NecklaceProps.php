<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\Properties\Necklaces;

use Domain\JewelleryGenerator\CategoryPropsBuilderInterface;
use Domain\JewelleryGenerator\Traits\MetalPriceDifferentiationTrait;
use Domain\JewelleryGenerator\Traits\SizePricePropsTrait;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Clasps\Enums\ClaspBuilderEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\NeckSizes\Enums\NeckSizeBuilderEnum;

final readonly class NecklaceProps implements CategoryPropsBuilderInterface
{
    use SizePricePropsTrait, MetalPriceDifferentiationTrait;

    public function __construct(private array $properties)
    {
    }

    public function getProps(): array
    {
        $metal = $this->properties['metalItem']['preciousMetals'][0]['preciousMetal'];
        $insert = $this->properties['insertItem'];

        $sizePrices = $this->getSizePrice($this->getPriceDifferentiation($metal), NeckSizeBuilderEnum::cases());

        return [
            'size_price_quantity' => $sizePrices,
            'clasp' => ClaspBuilderEnum::cases()[array_rand(ClaspBuilderEnum::cases())]->value,
            'necklace_sizes' => data_get($sizePrices, '*.size'),
            'quantity' => data_get($sizePrices, '*.quantity'),
            'price' => data_get($sizePrices, '*.price')
        ];
    }
}
