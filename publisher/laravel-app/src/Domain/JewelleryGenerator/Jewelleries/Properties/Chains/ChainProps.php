<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\Properties\Chains;

use Domain\JewelleryGenerator\CategoryPropsBuilderInterface;
use Domain\JewelleryGenerator\Traits\MetalPriceDifferentiationTrait;
use Domain\JewelleryGenerator\Traits\SizePricePropsTrait;
use Domain\Shared\JewelleryProperties\Clasps\Enums\ClaspBuilderEnum;
use Domain\Shared\JewelleryProperties\NeckSizes\Enums\NeckSizeBuilderEnum;
use Domain\Shared\JewelleryProperties\Weavings\Enums\WeavingBuilderEnum;
use Illuminate\Support\Arr;

final readonly class ChainProps implements CategoryPropsBuilderInterface
{
    use SizePricePropsTrait, MetalPriceDifferentiationTrait;

    public function __construct(private array $properties)
    {
    }

    public function getProps(): array
    {
        $metal = $this->properties['metalItem']['metalType'];
        $category = $this->properties['category'];

        $sizePrices = $this->getSizePrice($this->getPriceDifferentiation($metal), NeckSizeBuilderEnum::cases());

        return [
            'size_price_quantity' => $sizePrices,
            'clasp' => ClaspBuilderEnum::cases()[array_rand(ClaspBuilderEnum::cases())]->value,
            'weaving' => $this->getWeaving($category),
            'chain_sizes' => data_get($sizePrices, '*.size'),
            'quantity' => data_get($sizePrices, '*.quantity'),
            'price' => data_get($sizePrices, '*.price')
        ];
    }

    private function getWeaving($category): array
    {
        if ($category === 'цепи') {
            $is_weaving = 1;
        } else {
            $is_weaving = Arr::random([0, 1, 1]);
        }

        $weavings = WeavingBuilderEnum::cases();
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
