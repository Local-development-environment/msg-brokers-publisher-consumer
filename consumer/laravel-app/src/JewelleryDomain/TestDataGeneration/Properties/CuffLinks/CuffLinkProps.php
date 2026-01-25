<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\Properties\CuffLinks;

use JewelleryDomain\Jewellery\SpecProperties\CuffLinks\CuffLinkClasp\Enums\CuffLinkClaspNamesEnum;
use JewelleryDomain\Jewellery\SpecProperties\CuffLinks\CuffLinkForm\Enums\CuffLinkFormNamesEnum;
use JewelleryDomain\Jewellery\SpecProperties\CuffLinks\CuffLinkType\Enums\CuffLinkTypeNamesEnum;
use JewelleryDomain\TestDataGeneration\PropertyGeneratorInterface;
use JewelleryDomain\TestDataGeneration\Traits\RandomArrayElementWithProbabilityTrait;
use JewelleryDomain\TestDataGeneration\Traits\SpecPropertyTrait;
use Random\RandomException;

final readonly class CuffLinkProps implements PropertyGeneratorInterface
{
    use RandomArrayElementWithProbabilityTrait;
    use SpecPropertyTrait;

    public function __construct(private array $properties)
    {
    }

    /**
     * @throws RandomException
     */
    public function getProps(): array
    {
        $cuffLinkForm = $this->getCuffLinkForm();

        return [
            'nameFunction' => $this->getNameFunction($this->properties['jewelleryCategory']),
            'cuffLinkForm' => $cuffLinkForm,
            'cuffLinkClasp' => $this->getCuffLinkClasp(),
            'cuffLinkType' => $this->getCuffLinkType(),
            'dimensions' => $this->getDimensions($cuffLinkForm),
            'quantity' => random_int(0, 10),
        ];
    }

    private function getCuffLinkForm(): string
    {
        $enumClass = get_class(CuffLinkFormNamesEnum::FANTASY);
        $enumCases = CuffLinkFormNamesEnum::cases();

        return $this->getArrElement($enumCases, $enumClass);
    }

    private function getCuffLinkClasp(): string
    {
        $enumClass = get_class(CuffLinkClaspNamesEnum::TOGGLE);
        $enumCases = CuffLinkClaspNamesEnum::cases();

        return $this->getArrElement($enumCases, $enumClass);
    }

    private function getCuffLinkType(): string
    {
        $enumClass = get_class(CuffLinkTypeNamesEnum::SYMMETRIC);
        $enumCases = CuffLinkTypeNamesEnum::cases();

        return $this->getArrElement($enumCases, $enumClass);
    }

    /**
     * @throws RandomException
     */
    private function getDimensions(string $form): array
    {
        if ($form === CuffLinkFormNamesEnum::ROUND->value) {
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
