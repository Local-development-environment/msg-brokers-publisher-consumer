<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\Properties\Brooches;

use JewelleryDomain\Jewellery\SpecProperties\Brooches\BroochClasp\Enums\BroochClaspNamesEnum;
use JewelleryDomain\Jewellery\SpecProperties\Brooches\BroochType\Enums\BroochTypeNamesEnum;
use JewelleryDomain\TestDataGeneration\PropertyGeneratorInterface;
use JewelleryDomain\TestDataGeneration\Traits\RandomArrayElementWithProbabilityTrait;
use JewelleryDomain\TestDataGeneration\Traits\SpecPropertyTrait;
use Random\RandomException;

final readonly class BroochProps implements PropertyGeneratorInterface
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
            'broochClasp' => $this->getBroochClasp(),
            'broochType' => $this->getBroochType(),
            'dimensions' => ['height' => rand(15, 40), 'width' => rand(15, 40)],
            'quantity' => rand(0, 10),
        ];
    }

    private function getBroochClasp(): string
    {
        $enumClass = get_class(BroochClaspNamesEnum::MAGNET);
        $enumCases = BroochClaspNamesEnum::cases();

        return $this->getArrElement($enumCases, $enumClass);
    }

    private function getBroochType(): string
    {
        $enumClass = get_class(BroochTypeNamesEnum::CHATELAINE);
        $enumCases = BroochTypeNamesEnum::cases();

        return $this->getArrElement($enumCases, $enumClass);
    }
}
