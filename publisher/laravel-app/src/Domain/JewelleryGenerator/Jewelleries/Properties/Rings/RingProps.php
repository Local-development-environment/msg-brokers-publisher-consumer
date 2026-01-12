<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\Properties\Rings;

use Domain\Jewelleries\JewelleryCategories\Enums\JewelleryCategoryBuilderEnum;
use Domain\Jewelleries\JewelleryCategories\Enums\JewelleryCategoryEnum;
use Domain\JewelleryGenerator\CategoryPropsBuilderInterface;
use Domain\JewelleryGenerator\Traits\MetalPriceDifferentiationTrait;
use Domain\JewelleryGenerator\Traits\ProbabilityArrayElementTrait;
use Domain\JewelleryGenerator\Traits\SizePricePropsTrait;
use Domain\JewelleryProperties\Rings\RingFingers\Enums\RingFingerBuilderEnum;
use Domain\JewelleryProperties\Rings\RingSizes\Enums\RingSizeBuilderEnum;
use Domain\JewelleryProperties\Rings\RingTypes\Enums\RingTypeBuilderEnum;
use Domain\JewelleryProperties\Rings\RingTypes\Models\RingType;
use Illuminate\Support\Arr;

final readonly class RingProps implements CategoryPropsBuilderInterface
{
    use SizePricePropsTrait, MetalPriceDifferentiationTrait, ProbabilityArrayElementTrait;

    public function __construct(private array $properties)
    {
    }

    public function getProps(): array
    {
//        dd(RingTypeBuilderEnum::from('комбинированное'));
        $ringTypeCases = RingTypeBuilderEnum::cases();
//    dump($this->properties['insertItem']);
//        dd(!$this->properties['insertItem']);
        if (count($this->properties['metalItem']['preciousMetals']) > 1) {
            $ringType = RingTypeBuilderEnum::COMBINATION->value;
        } elseif (!$this->properties['insertItem']) {
            $types = array_filter($ringTypeCases, function (object $v, int $k) {
                return $v->value === RingTypeBuilderEnum::WEDDING->value ||
                    $v->value === RingTypeBuilderEnum::SIGNET_RING->value;
            }, ARRAY_FILTER_USE_BOTH);
            $ringType = $types[array_rand($types)]->value;

        } elseif ($this->properties['insertItem'] === 1) {
            $types = array_filter($ringTypeCases, function (object $v, int $k) {
                return $v->value === RingTypeBuilderEnum::ENGAGEMENT->value ||
                    $v->value === RingTypeBuilderEnum::MASSIVE_RING->value ||
                    $v->value === RingTypeBuilderEnum::CLASSIC->value;
            }, ARRAY_FILTER_USE_BOTH);
            $ringType = $types[array_rand($types)]->value;
        } elseif ($this->properties['insertItem'] > 1) {
            $types = array_filter($ringTypeCases, function (object $v, int $k) {
                return $v->value === RingTypeBuilderEnum::CLASSIC->value ||
                    $v->value === RingTypeBuilderEnum::MASSIVE_RING->value;
            }, ARRAY_FILTER_USE_BOTH);
            $ringType = $types[array_rand($types)]->value;
        }
        else {
            $types = array_filter($ringTypeCases, function (object $v, int $k) {
                return $v->value !== RingTypeBuilderEnum::COMBINATION->value;
            }, ARRAY_FILTER_USE_BOTH);

            $ringType = $types[array_rand($types)]->value;
        }

        $metal = $this->properties['metalItem']['preciousMetals'][0]['preciousMetal'];
        $insert = $this->properties['insertItem'];

        $sizePrices = $this->getSizePrice($this->getPriceDifferentiation($metal), RingSizeBuilderEnum::cases());

        return [
            'size_price_quantity' => $sizePrices,
            /** ring_type property needs adding to ring generator */
            'ring_type' => $ringType,
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

    private function getRingType(array $t): string
    {
        $enumClass = get_class(RingTypeBuilderEnum::CLASSIC);
        $enumCases = $t;

        return $this->getArrElement($enumCases, $enumClass);
    }
}
