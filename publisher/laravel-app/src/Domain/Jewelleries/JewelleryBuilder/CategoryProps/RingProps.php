<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryBuilder\CategoryProps;

use Domain\Jewelleries\JewelleryBuilder\CategoryPropsBuilderInterface;
use Domain\Jewelleries\JewelleryBuilder\MetalPriceDifferentiationTrait;
use Domain\Jewelleries\JewelleryBuilder\SizePricePropsTrait;
use Illuminate\Support\Arr;

final readonly class RingProps implements CategoryPropsBuilderInterface
{
    use SizePricePropsTrait, MetalPriceDifferentiationTrait;

    public function __construct(private array $properties)
    {
    }

    public function getProps(): array
    {
        $metal = $this->properties['prcsMetal'];
        $insert = $this->properties['insert'];

        $sizes = data_get(config('data-seed.data_items.ring_sizes'), '*.value');
        $sizePrices = $this->getSizePrice($this->getPriceDifferentiation($metal), $sizes);

        return [
            'size_price_quantity' => $sizePrices,
            'ring_finger' => $this->getRingFinger(),
            'ring_sizes' => data_get($sizePrices, '*.size'),
            'quantity' => data_get($sizePrices, '*.quantity'),
            'price' => data_get($sizePrices, '*.price'),
            'dimensions' => [
                'ширина шинки' => fake()->randomFloat(1, 1, 6) . ' мм',
            ],
        ];
    }

    private function getRingFinger(): string
    {
        $ringFingers = config('data-seed.data_items.ring_fingers');
        $prepRingFingers = array_fill(0, 20, $ringFingers[0]);
        $prepRingFingers[] = $ringFingers[1];

        return Arr::random($prepRingFingers);

    }
}
