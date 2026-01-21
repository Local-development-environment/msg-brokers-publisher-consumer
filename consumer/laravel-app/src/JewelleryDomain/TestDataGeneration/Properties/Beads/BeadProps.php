<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\Properties\Beads;

use JewelleryDomain\Jewellery\Shared\SpecProperties\Clasps\Enums\ClaspNamesEnum;
use JewelleryDomain\Jewellery\Shared\SpecProperties\NeckSizes\Enums\NeckSizeValuesEnum;
use JewelleryDomain\Jewellery\SpecProperties\Beads\BeadBase\Enums\BeadBaseNamesEnum;
use JewelleryDomain\TestDataGeneration\PropertyGeneratorInterface;
use JewelleryDomain\TestDataGeneration\Traits\RandomArrayElementWithProbabilityTrait;
use JewelleryDomain\TestDataGeneration\Traits\SpecPropertyTrait;
use Random\RandomException;

final readonly class BeadProps implements PropertyGeneratorInterface
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
        $specProps = [];

        $specProps['nameFunction'] = $this->getNameFunction($this->properties['jewelleryCategory']);
        $specProps['beadBase'] = $this->getBeadBase();
        $specProps['clasp'] = $this->getClasp();
        $specProps['metrics'] = $this->getMetrics();

        return $specProps;
    }

    private function getBeadBase(): string
    {
        $enumClass = get_class(BeadBaseNamesEnum::TEXTILE_CORD);
        $enumCases = BeadBaseNamesEnum::cases();

        return $this->getArrElement($enumCases, $enumClass);
    }

    private function getClasp(): string
    {
        $enumClass = get_class(ClaspNamesEnum::CARABINER);
        $enumCases = ClaspNamesEnum::cases();

        return $this->getArrElement($enumCases, $enumClass);
    }

    /**
     * @throws RandomException
     */
    private function getMetrics(): array
    {
        $randNumElements = rand(2, count(NeckSizeValuesEnum::cases()));
        $array = json_decode((string) json_encode(NeckSizeValuesEnum::cases()), true);

        return $this->getSizeQuantity($array, $randNumElements);
    }
}
