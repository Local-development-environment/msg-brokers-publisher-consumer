<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\Properties\TieClips;

use Domain\JewelleryGenerator\CategoryPropsBuilderInterface;
use Domain\JewelleryGenerator\Traits\MetalPriceDifferentiationTrait;
use Domain\JewelleryGenerator\Traits\ProbabilityArrayElementTrait;
use Domain\JewelleryGenerator\Traits\SizePricePropsTrait;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\TieClips\TieClipTypes\Enums\TieClipTypeBuilderEnum;
use Random\RandomException;

final readonly class TieClipProps implements CategoryPropsBuilderInterface
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
            'tieClipType' => $this->getTieClipType(),
            'dimensions' => ['height' => random_int(3, 10), 'length' => random_int(30, 50)],
            'quantity' => $this->getQuantity(),
            'price' => $this->getPriceDifferentiation($properties['metalItem']['preciousMetals'][0]['preciousMetal']),
        ];
    }

    private function getTieClipType(): string
    {
        $enumClass = get_class(TieClipTypeBuilderEnum::CLIP);
        $enumCases = TieClipTypeBuilderEnum::cases();

        return $this->getArrElement($enumCases, $enumClass);
    }
}
