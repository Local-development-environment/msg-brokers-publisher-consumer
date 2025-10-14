<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryBuilder\CategoryProps;

use Domain\Jewelleries\JewelleryBuilder\CategoryPropsBuilderInterface;
use Domain\Jewelleries\JewelleryBuilder\MetalPriceDifferentiationTrait;
use Domain\Jewelleries\JewelleryBuilder\SizePricePropsTrait;
use Domain\Shared\JewelleryProperties\Clasps\Enums\ClaspListEnum;
use Illuminate\Support\Arr;

final readonly class ChainProps implements CategoryPropsBuilderInterface
{
    use SizePricePropsTrait, MetalPriceDifferentiationTrait;

    public function __construct(private array $properties)
    {
    }

    public function getProps(): array
    {
        $metal = $this->properties['prcsMetal'];
        $insert = $this->properties['insert'];

        $sizes = data_get(config('data-seed.data_items.chain_sizes'), '*.value');
        $sizePrices = $this->getSizePrice($this->getPriceDifferentiation($metal), $sizes);

        return [
            'size_price_quantity' => $sizePrices,
            'clasp' => ClaspListEnum::cases()[array_rand(ClaspListEnum::cases())]->value,
            'weaving' => $this->getWeaving(),
            'chain_sizes' => data_get($sizePrices, '*.size'),
            'quantity' => data_get($sizePrices, '*.quantity'),
            'price' => data_get($sizePrices, '*.price')
        ];
    }

    private function getWeaving(): array
    {
        $is_weaving = Arr::random([0, 1, 1]);

        $weavings = config('data-seed.data_items.jw_weavings');
        if ($is_weaving === 1) {
            return [
                'weaving' => Arr::random($weavings),
                'fullness' => Arr::random(['полнотелая', 'полнотелая', 'полнотелая', 'пустотелая']),
                'wire_diameter' => fake()->randomFloat(1, 0.5, 1.5)
            ];
        } else {
            return [];
        }
    }
}
