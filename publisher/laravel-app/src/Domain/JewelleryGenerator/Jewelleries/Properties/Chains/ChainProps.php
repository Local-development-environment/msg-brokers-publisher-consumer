<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\Properties\Chains;

use Domain\JewelleryGenerator\CategoryPropsBuilderInterface;
use Domain\JewelleryGenerator\Traits\MetalPriceDifferentiationTrait;
use Domain\JewelleryGenerator\Traits\SizePricePropsTrait;
use Illuminate\Support\Arr;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Clasps\Enums\ClaspBuilderEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\NeckSizes\Enums\NeckSizeBuilderEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Weavings\Enums\WeavingBuilderEnum;

final readonly class ChainProps implements CategoryPropsBuilderInterface
{
    use SizePricePropsTrait, MetalPriceDifferentiationTrait;

    public function __construct(private array $properties)
    {
    }

    public function getProps(): array
    {
        $metal = $this->properties['metalItem']['preciousMetals'][0]['preciousMetal'];
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
                'weaving' => Arr::random($weavings)->value,
                'fullness' => Arr::random(['полнотелая', 'полнотелая', 'полнотелая', 'пустотелая']),
                'wire_diameter' => fake()->randomFloat(1, 0.5, 1.5)
            ];
        } else {
            return [];
        }
    }
}
