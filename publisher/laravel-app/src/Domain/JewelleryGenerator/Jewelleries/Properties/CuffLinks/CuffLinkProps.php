<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\Properties\CuffLinks;

use Domain\JewelleryGenerator\CategoryPropsBuilderInterface;
use Domain\JewelleryGenerator\Traits\MetalPriceDifferentiationTrait;
use Domain\JewelleryGenerator\Traits\ProbabilityArrayElementTrait;
use Domain\JewelleryGenerator\Traits\SizePricePropsTrait;
use Domain\JewelleryProperties\CuffLinks\CuffLinkClasps\Enums\CuffLinkClaspBuilderEnum;
use Domain\JewelleryProperties\CuffLinks\CuffLinkForms\Enums\CuffLinkFormBuilderEnum;
use Domain\JewelleryProperties\CuffLinks\CuffLinkTypes\Enums\CuffLinkTypeBuilderEnum;
use Random\RandomException;

final readonly class CuffLinkProps implements CategoryPropsBuilderInterface
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
        $cuffLinkForm = $this->getCuffLinkForm();

        return [
            'cuffLinkForm' => $cuffLinkForm,
            'cuffLinkClasp' => $this->getCuffLinkClasp(),
            'cuffLinkType' => $this->getCuffLinkType(),
            'dimensions' => $this->getDimensions($cuffLinkForm),
            'quantity' => $this->getQuantity(),
            'price' => $this->getPriceDifferentiation($properties['metalItem']['preciousMetals'][0]['preciousMetal']),
        ];
    }

    private function getCuffLinkForm(): string
    {
        $enumClass = get_class(CuffLinkFormBuilderEnum::FANTASY);
        $enumCases = CuffLinkFormBuilderEnum::cases();

        return $this->getArrElement($enumCases, $enumClass);
    }

    private function getCuffLinkClasp(): string
    {
        $enumClass = get_class(CuffLinkClaspBuilderEnum::TOGGLE);
        $enumCases = CuffLinkClaspBuilderEnum::cases();

        return $this->getArrElement($enumCases, $enumClass);
    }

    private function getCuffLinkType(): string
    {
        $enumClass = get_class(CuffLinkTypeBuilderEnum::SYMMETRIC);
        $enumCases = CuffLinkTypeBuilderEnum::cases();

        return $this->getArrElement($enumCases, $enumClass);
    }

    /**
     * @throws RandomException
     */
    private function getDimensions(string $form): array
    {
        if ($form === CuffLinkFormBuilderEnum::ROUND->value) {
            return [
                'height' => random_int(1, 4),
                'diameter' => random_int(10, 16),
            ];
        } else {
            return [
                'height' => random_int(1, 4),
                'length' => random_int(8, 16),
                'width' => random_int(8, 10),
            ];
        }
    }
}
