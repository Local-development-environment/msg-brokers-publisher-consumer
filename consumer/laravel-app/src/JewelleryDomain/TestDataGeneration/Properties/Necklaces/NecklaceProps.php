<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\Properties\Necklaces;

use JewelleryDomain\Jewellery\Shared\SpecProperties\Clasps\Enums\ClaspNamesEnum;
use JewelleryDomain\Jewellery\Shared\SpecProperties\NeckSizes\Enums\NeckSizeValuesEnum;
use JewelleryDomain\TestDataGeneration\PropertyGeneratorInterface;
use JewelleryDomain\TestDataGeneration\Traits\RandomArrayElementWithProbabilityTrait;
use JewelleryDomain\TestDataGeneration\Traits\SpecPropertyTrait;
use Random\RandomException;

final readonly class NecklaceProps implements PropertyGeneratorInterface
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
        $specProps['clasp'] = $this->getClasp();
        $specProps['metrics'] = $this->getMetrics();

        return $specProps;
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
