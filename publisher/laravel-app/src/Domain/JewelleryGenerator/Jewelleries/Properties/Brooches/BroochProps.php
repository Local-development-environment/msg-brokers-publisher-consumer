<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\Properties\Brooches;

use Domain\JewelleryGenerator\CategoryPropsBuilderInterface;
use Domain\JewelleryGenerator\Traits\MetalPriceDifferentiationTrait;
use Domain\JewelleryGenerator\Traits\ProbabilityArrayElementTrait;
use Domain\JewelleryGenerator\Traits\SizePricePropsTrait;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Brooches\BroochClasps\Enums\BroochClaspBuilderEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Brooches\BroochTypes\Enums\BroochTypeBuilderEnum;
use Random\RandomException;

final readonly class BroochProps implements CategoryPropsBuilderInterface
{
    use SizePricePropsTrait, MetalPriceDifferentiationTrait, ProbabilityArrayElementTrait;

    public function __construct(private array $properties)
    {
    }

    /**
     * @throws RandomException
     */
    public function getProps(): array
    {
        $properties = $this->properties;

        return [
            'broochClasp' => $this->getBroochClasp(),
            'broochType' => $this->getBroochType(),
            'dimensions' => ['height' => random_int(15, 40), 'width' => random_int(15, 40)],
            'quantity' => $this->getQuantity(),
            'price' => $this->getPriceDifferentiation($properties['metalItem']['preciousMetals'][0]['preciousMetal']),
        ];
    }

    private function getBroochClasp(): string
    {
        $enumClass = get_class(BroochClaspBuilderEnum::MAGNET);
        $enumCases = BroochClaspBuilderEnum::cases();

        return $this->getArrElement($enumCases, $enumClass);
    }

    private function getBroochType(): string
    {
        $enumClass = get_class(BroochTypeBuilderEnum::CHATELAINE);
        $enumCases = BroochTypeBuilderEnum::cases();

        return $this->getArrElement($enumCases, $enumClass);
    }
}
