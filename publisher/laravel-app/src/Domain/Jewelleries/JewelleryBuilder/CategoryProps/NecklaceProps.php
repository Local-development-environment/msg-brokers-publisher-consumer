<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryBuilder\CategoryProps;

use Domain\Jewelleries\JewelleryBuilder\CategoryPropsBuilderInterface;
use Domain\Jewelleries\JewelleryBuilder\MetalPriceDifferentiationTrait;
use Domain\Jewelleries\JewelleryBuilder\SizePricePropsTrait;

final readonly class NecklaceProps implements CategoryPropsBuilderInterface
{
    use SizePricePropsTrait, MetalPriceDifferentiationTrait;

    public function __construct(private array $properties)
    {
    }

    public function getProps(): array
    {
        $metal = $this->properties['prcsMetal'];
        $insert = $this->properties['insert'];

        $clasps = config('data-seed.data_items.jw_clasps');
        $sizes = data_get(config('data-seed.data_items.necklace_sizes'), '*.value');
        $sizePrices = $this->getSizePrice($this->getPriceDifferentiation($metal), $sizes);

        return [
            'size_price_quantity' => $sizePrices,
            'clasp' => $clasps[array_rand($clasps, 1)],
            'necklace_sizes' => data_get($sizePrices, '*.size'),
            'quantity' => data_get($sizePrices, '*.quantity'),
            'price' => data_get($sizePrices, '*.price')
        ];
    }
}
