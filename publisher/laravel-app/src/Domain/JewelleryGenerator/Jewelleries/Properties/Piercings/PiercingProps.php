<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\Properties\Piercings;

use Domain\JewelleryGenerator\CategoryPropsBuilderInterface;
use Domain\JewelleryGenerator\Traits\MetalPriceDifferentiationTrait;
use Domain\JewelleryGenerator\Traits\ProbabilityArrayElementTrait;
use Domain\JewelleryGenerator\Traits\SizePricePropsTrait;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Piercings\PiercingTypes\Enums\PiercingTypeBuilderEnum;

final readonly class PiercingProps implements CategoryPropsBuilderInterface
{
    use SizePricePropsTrait, MetalPriceDifferentiationTrait, ProbabilityArrayElementTrait;

    public function __construct(private array $properties)
    {
    }

    public function getProps(): array
    {
        $properties = $this->properties;
        $piercingType = $this->getPiercingType();

        return [
            'piercingType' => $piercingType,
            'quantity' => $this->getQuantity(),
            'price' => $this->getPriceDifferentiation($properties['metalItem']['preciousMetals'][0]['preciousMetal']),
        ];
    }

    private function getPiercingType(): string
    {
        $enumClass = get_class(PiercingTypeBuilderEnum::BANANA);
        $enumCases = PiercingTypeBuilderEnum::cases();

        return $this->getArrElement($enumCases, $enumClass);
    }
}
