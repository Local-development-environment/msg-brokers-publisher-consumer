<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryBuilder\CategoryProps;

use Domain\Jewelleries\JewelleryBuilder\CategoryPropsBuilderInterface;
use Domain\Jewelleries\JewelleryBuilder\MetalPriceDifferentiationTrait;
use Domain\Jewelleries\JewelleryBuilder\SizePricePropsTrait;
use Domain\JewelleryProperties\Bracelets\BraceletSizes\Enums\BraceletSizeListEnum;
use Domain\Shared\JewelleryProperties\Clasps\Enums\ClaspListEnum;
use Domain\Shared\JewelleryProperties\Weavings\Enums\WeavingListEnum;
use Illuminate\Support\Arr;

final readonly class BraceletProps implements CategoryPropsBuilderInterface
{
    use SizePricePropsTrait, MetalPriceDifferentiationTrait;

    public function __construct(private array $properties)
    {
    }

    public function getProps(): array
    {
        $metal = $this->properties['metalType'];
        $insert = $this->properties['insert'];

//        $sizes = data_get(config('data-seed.data_items.bracelet_sizes'), '*.value');
        $sizes = BraceletSizeListEnum::cases();

        $sizePrices = $this->getSizePrice($this->getPriceDifferentiation($metal), $sizes);

        return [
            'size_price_quantity' => $sizePrices,
            'clasp' => ClaspListEnum::cases()[array_rand(ClaspListEnum::cases())]->value,
            'weaving' => $this->getWeaving(),
            'body_part' => $this->getBodyPart(),
            'bracelet_sizes' => data_get($sizePrices, '*.size'),
            'bracelet_bases' => $this->getBraceletBase($insert),
            'quantity' => data_get($sizePrices, '*.quantity'),
            'price' => data_get($sizePrices, '*.price')
        ];
    }

    private function getWeaving(): array
    {
        $is_weaving = Arr::random([0, 1, 1]);

        $weavings = WeavingListEnum::cases();
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

    private function getBodyPart(): string
    {
        $bodyParts = config('data-seed.data_items.body_parts');
        $prepBodyParts = array_fill(0, 20, $bodyParts[0]);
        $prepBodyParts[] = $bodyParts[1];

        return Arr::random($prepBodyParts);

    }

    private function getBraceletBase(array $insert): string
    {
        if ($insert) {
            if (count($insert) === 1) {
                if ($insert[0]['stone'] === 'жемчуг') {
                    $braceletBases = array_diff(config('data-seed.data_items.bracelet_bases'), ['металлическая', 'шнурок']);

                    return Arr::random($braceletBases);
                }
            }
        }

        return 'металлическая';

    }
}
