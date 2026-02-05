<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\Properties\Rings;

use Domain\JewelleryGenerator\CategoryPropsBuilderInterface;
use Domain\JewelleryGenerator\Traits\MetalPriceDifferentiationTrait;
use Domain\JewelleryGenerator\Traits\ProbabilityArrayElementTrait;
use Domain\JewelleryGenerator\Traits\SizePricePropsTrait;
use Domain\JewelleryProperties\Rings\RingFingers\Enums\RingFingerBuilderEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingSizes\Enums\RingSizeBuilderEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingSpecifics\Enums\RingSpecificBuilderEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingTypes\Enums\RingTypeBuilderEnum;

final readonly class RingProps implements CategoryPropsBuilderInterface
{
    use SizePricePropsTrait, MetalPriceDifferentiationTrait, ProbabilityArrayElementTrait;

    public function __construct(private array $properties)
    {
    }

    public function getProps(): array
    {
//        $ringTypeCases = RingTypeBuilderEnum::cases();
//
//        if (count($this->properties['metalItem']['preciousMetals']) > 1) {
//            $ringSpecific = RingSpecificBuilderEnum::COMBINATION->value;
//        } elseif (!$this->properties['insertItem']) {
//            $types = array_filter($ringTypeCases, function (object $v, int $k) {
//                return $v->value === RingSpecificBuilderEnum::WEDDING->value ||
//                    $v->value === RingSpecificBuilderEnum::SIGNET_RING->value;
//            }, ARRAY_FILTER_USE_BOTH);
//            $ringType = $types[array_rand($types)]->value;
//
//        } elseif ($this->properties['insertItem'] === 1) {
//            $types = array_filter($ringTypeCases, function (object $v, int $k) {
//                return $v->value === RingTypeBuilderEnum::ENGAGEMENT->value ||
//                    $v->value === RingTypeBuilderEnum::MASSIVE_RING->value ||
//                    $v->value === RingTypeBuilderEnum::CLASSIC->value;
//            }, ARRAY_FILTER_USE_BOTH);
//            $ringType = $types[array_rand($types)]->value;
//        } elseif ($this->properties['insertItem'] > 1) {
//            $types = array_filter($ringTypeCases, function (object $v, int $k) {
//                return $v->value === RingTypeBuilderEnum::CLASSIC->value ||
//                    $v->value === RingTypeBuilderEnum::MASSIVE_RING->value;
//            }, ARRAY_FILTER_USE_BOTH);
//            $ringType = $types[array_rand($types)]->value;
//        }
//        else {
//            $types = array_filter($ringTypeCases, function (object $v, int $k) {
//                return $v->value !== RingSpecificBuilderEnum::COMBINATION->value;
//            }, ARRAY_FILTER_USE_BOTH);
//
//            $ringSpecific = $types[array_rand($types)]->value;
//        }
//
        $metal = $this->properties['metalItem']['preciousMetals'][0]['preciousMetal'];
        $insert = $this->properties['insertItem'];

        $ringType = $this->getRingType();
        $ringSpecific = $this->getRingSpecific();

        $sizePrices = $this->getSizePrice($this->getPriceDifferentiation($metal), RingSizeBuilderEnum::cases());

        return [
            'size_price_quantity' => $sizePrices,
            /** ring_type property needs adding to ring generator */
            'ring_type' => $ringType,
            'ring_specific' => $ringSpecific,
            'ring_sizes' => data_get($sizePrices, '*.size'),
            'quantity' => data_get($sizePrices, '*.quantity'),
            'price' => data_get($sizePrices, '*.price'),
            'dimensions' => [
                'ширина шинки' => fake()->randomFloat(1, 1, 6) . ' мм',
            ],
        ];
    }

    private function getRingType(): string
    {
        $enumClass = get_class(RingTypeBuilderEnum::CLASSIC);
        $enumCases = RingTypeBuilderEnum::cases();

        return $this->getArrElement($enumCases, $enumClass);
    }

    private function getRingSpecific(): string
    {
        $enumClass = get_class(RingSpecificBuilderEnum::COMBINATION);
        $enumCases = RingSpecificBuilderEnum::cases();

        return $this->getArrElement($enumCases, $enumClass);
    }
}
