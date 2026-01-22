<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\Properties\CuffLinks;

use JewelleryDomain\Jewellery\SpecProperties\CuffLinks\CuffLinkClasp\Enums\CuffLinkClaspNameEnum;
use JewelleryDomain\Jewellery\SpecProperties\CuffLinks\CuffLinkForm\Enums\CuffLinkFormNameEnum;
use JewelleryDomain\Jewellery\SpecProperties\CuffLinks\CuffLinkType\Enums\CuffLinkTypeNameEnum;
use JewelleryDomain\TestDataGeneration\PropertyGeneratorInterface;
use JewelleryDomain\TestDataGeneration\Traits\RandomArrayElementWithProbabilityTrait;
use Random\RandomException;

final readonly class CuffLinkProps implements PropertyGeneratorInterface
{
    use RandomArrayElementWithProbabilityTrait;

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
            'quantity' => random_int(0, 10),
        ];
    }

    private function getCuffLinkForm(): string
    {
        $enumClass = get_class(CuffLinkFormNameEnum::FANTASY);
        $enumCases = CuffLinkFormNameEnum::cases();

        return $this->getArrElement($enumCases, $enumClass);
    }

    private function getCuffLinkClasp(): string
    {
        $enumClass = get_class(CuffLinkClaspNameEnum::TOGGLE);
        $enumCases = CuffLinkClaspNameEnum::cases();

        return $this->getArrElement($enumCases, $enumClass);
    }

    private function getCuffLinkType(): string
    {
        $enumClass = get_class(CuffLinkTypeNameEnum::SYMMETRIC);
        $enumCases = CuffLinkTypeNameEnum::cases();

        return $this->getArrElement($enumCases, $enumClass);
    }

    /**
     * @throws RandomException
     */
    private function getDimensions(string $form): array
    {
        if ($form === CuffLinkFormNameEnum::ROUND->value) {
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
