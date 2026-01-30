<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\Properties\Earrings;

use JewelleryDomain\Jewellery\SpecProperties\Earrings\EarringClasp\Enums\EarringTypeNamesEnum;
use JewelleryDomain\Jewellery\SpecProperties\Earrings\EarringType\Enums\EarringClaspNamesEnum;
use JewelleryDomain\TestDataGeneration\PropertyGeneratorInterface;
use JewelleryDomain\TestDataGeneration\Traits\RandomArrayElementWithProbabilityTrait;
use JewelleryDomain\TestDataGeneration\Traits\SpecPropertyTrait;
use Random\RandomException;

final readonly class EarringProps implements PropertyGeneratorInterface
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
            'piercingClasp' => $this->getEarringClasp(),
            'piercingType' => $this->getEarringType(),
            'quantity' => rand(0, 10),
        ];
    }

    private function getEarringClasp(): string
    {
        $enumClass = get_class(EarringClaspNamesEnum::LOOP);
        $enumCases = EarringClaspNamesEnum::cases();

        return $this->getArrElement($enumCases, $enumClass);
    }

    private function getEarringType(): string
    {
        $enumClass = get_class(EarringTypeNamesEnum::CLIMBERS);
        $enumCases = EarringTypeNamesEnum::cases();

        return $this->getArrElement($enumCases, $enumClass);
    }
}
