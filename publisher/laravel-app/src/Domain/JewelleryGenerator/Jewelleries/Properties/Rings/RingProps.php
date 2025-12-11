<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\Properties\Rings;

use Domain\JewelleryGenerator\CategoryPropsBuilderInterface;
use Domain\JewelleryGenerator\Traits\MetalPriceDifferentiationTrait;
use Domain\JewelleryGenerator\Traits\ProbabilityArrayElementTrait;
use Domain\JewelleryGenerator\Traits\SizePricePropsTrait;
use Domain\JewelleryProperties\Rings\RingFingers\Enums\RingFingerBuilderEnum;
use Domain\JewelleryProperties\Rings\RingSizes\Enums\RingSizeBuilderEnum;
use Illuminate\Support\Arr;

final readonly class RingProps implements CategoryPropsBuilderInterface
{
    use SizePricePropsTrait, MetalPriceDifferentiationTrait, ProbabilityArrayElementTrait;

    public function __construct(private array $properties)
    {
    }

    public function getProps(): array
    {
        $metal = $this->properties['metalItem']['metalType'];
        $insert = $this->properties['insertItem'];

        $sizePrices = $this->getSizePrice($this->getPriceDifferentiation($metal), RingSizeBuilderEnum::cases());

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
        $enumClass = get_class(RingFingerBuilderEnum::FINGER);
        $enumCases = RingFingerBuilderEnum::cases();

        return $this->getArrElement($enumCases, $enumClass);
    }
}
