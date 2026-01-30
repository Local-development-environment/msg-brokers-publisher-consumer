<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\Properties\Piercings;

use JewelleryDomain\Jewellery\SpecProperties\Piercings\PiercingType\Enums\PiercingTypeNamesEnum;
use JewelleryDomain\TestDataGeneration\PropertyGeneratorInterface;
use JewelleryDomain\TestDataGeneration\Traits\RandomArrayElementWithProbabilityTrait;
use JewelleryDomain\TestDataGeneration\Traits\SpecPropertyTrait;
use Random\RandomException;

final readonly class PiercingProps implements PropertyGeneratorInterface
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
        return [
            'nameFunction' => $this->getNameFunction($this->properties['jewelleryCategory']),
            'piercingTypeType' => $this->getPiercingType(),
            'quantity' => rand(0, 10),
        ];
    }

    private function getPiercingType(): string
    {
        $enumClass = get_class(PiercingTypeNamesEnum::LABRET);
        $enumCases = PiercingTypeNamesEnum::cases();

        return $this->getArrElement($enumCases, $enumClass);
    }
}
