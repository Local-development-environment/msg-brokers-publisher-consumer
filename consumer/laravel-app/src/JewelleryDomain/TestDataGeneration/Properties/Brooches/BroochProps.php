<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\Properties\Brooches;

use JewelleryDomain\Jewellery\SpecProperties\Brooches\BroochClasp\Enums\BroochClaspNameEnum;
use JewelleryDomain\Jewellery\SpecProperties\Brooches\BroochType\Enums\BroochTypeNameEnum;
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
            'broochClasp' => $this->getBroochClasp(),
            'broochType' => $this->getBroochType(),
            'dimensions' => ['height' => random_int(15, 40), 'width' => random_int(15, 40)],
            'quantity' => random_int(0, 10),
        ];
    }

    private function getBroochClasp(): string
    {
        $enumClass = get_class(BroochClaspNameEnum::MAGNET);
        $enumCases = BroochClaspNameEnum::cases();

        return $this->getArrElement($enumCases, $enumClass);
    }

    private function getBroochType(): string
    {
        $enumClass = get_class(BroochTypeNameEnum::CHATELAINE);
        $enumCases = BroochTypeNameEnum::cases();

        return $this->getArrElement($enumCases, $enumClass);
    }
}
