<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\Properties\Bracelets;

use Domain\Inserts\Stones\Enums\StoneBuilderEnum;
use Domain\JewelleryGenerator\CategoryPropsBuilderInterface;
use Domain\JewelleryGenerator\Traits\MetalPriceDifferentiationTrait;
use Domain\JewelleryGenerator\Traits\ProbabilityArrayElementTrait;
use Domain\JewelleryGenerator\Traits\SizePricePropsTrait;
use Domain\JewelleryProperties\Bracelets\BodyParts\Enums\BodyPartBuilderEnum;
use Domain\JewelleryProperties\Bracelets\BraceletBases\Enums\BraceletBaseBuilderEnum;
use Domain\JewelleryProperties\Bracelets\BraceletSizes\Enums\BraceletSizeBuilderEnum;
use Domain\Shared\JewelleryProperties\Clasps\Enums\ClaspBuilderEnum;
use Domain\Shared\JewelleryProperties\Weavings\Enums\WeavingBuilderEnum;
use Illuminate\Support\Arr;

final readonly class BraceletProps implements CategoryPropsBuilderInterface
{
    use SizePricePropsTrait, MetalPriceDifferentiationTrait, ProbabilityArrayElementTrait;

    public function __construct(private array $properties)
    {
    }

    public function getProps(): array
    {
        $metal = $this->properties['metalItem']['preciousMetals'][0]['preciousMetal'];
        $insert = $this->properties['insertItem'];

        $sizes = BraceletSizeBuilderEnum::cases();

        $sizePrices = $this->getSizePrice($this->getPriceDifferentiation($metal), $sizes);

        return [
            'size_price_quantity' => $sizePrices,
            'clasp' => ClaspBuilderEnum::cases()[array_rand(ClaspBuilderEnum::cases())]->value,
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

        $weavings = WeavingBuilderEnum::cases();
        if ($is_weaving === 1) {
            return [
                'weaving' => $weavings[array_rand($weavings)]->value,
                'fullness' => Arr::random(['полнотелая', 'полнотелая', 'полнотелая', 'пустотелая']),
                'wire_diameter' => fake()->randomFloat(1, 0.5, 1.5)
            ];
        } else {
            return [];
        }
    }

    private function getBodyPart(): string
    {
        $enumClass = get_class(BodyPartBuilderEnum::WRIST);
        $enumCases = BodyPartBuilderEnum::cases();

        return $this->getArrElement($enumCases, $enumClass);
    }

    private function getBraceletBase(array $insert): string
    {
        if ($insert) {
            $enumClass = get_class(BraceletBaseBuilderEnum::METAL_CHAIN);
            $enumCases = BraceletBaseBuilderEnum::cases();

            return $this->getArrElement($enumCases, $enumClass);
        } else {
            return BraceletBaseBuilderEnum::METAL_CHAIN->value;
        }
    }
}
