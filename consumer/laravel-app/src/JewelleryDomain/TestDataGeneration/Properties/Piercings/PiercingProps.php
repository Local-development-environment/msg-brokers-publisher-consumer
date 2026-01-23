<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\Properties\Piercings;

use JewelleryDomain\Jewellery\SpecProperties\Piercings\PiercingType\Enums\PiercingTypeNameEnum;
use JewelleryDomain\TestDataGeneration\PropertyGeneratorInterface;
use JewelleryDomain\TestDataGeneration\Traits\RandomArrayElementWithProbabilityTrait;
use Random\RandomException;

final readonly class PiercingProps implements PropertyGeneratorInterface
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

        return [
            'piercingTypeType' => $this->getPiercingType(),
            'quantity' => random_int(0, 10),
        ];
    }

    private function getPiercingType(): string
    {
        $enumClass = get_class(PiercingTypeNameEnum::LABRET);
        $enumCases = PiercingTypeNameEnum::cases();

        return $this->getArrElement($enumCases, $enumClass);
    }
}
