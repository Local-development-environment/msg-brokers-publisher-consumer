<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\Properties\Rings;

use JewelleryDomain\Jewellery\SpecProperties\Rings\RingFinger\Enums\RingFingerNamesEnum;
use JewelleryDomain\Jewellery\SpecProperties\Rings\RingSize\Enums\RingSizeValuesEnum;
use JewelleryDomain\Jewellery\SpecProperties\Rings\RingType\Enums\RingTypeNamesEnum;
use JewelleryDomain\TestDataGeneration\PropertyGeneratorInterface;
use JewelleryDomain\TestDataGeneration\Traits\RandomArrayElementWithProbabilityTrait;
use JewelleryDomain\TestDataGeneration\Traits\SpecPropertyTrait;
use Random\RandomException;

final readonly class RingProps implements PropertyGeneratorInterface
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
        $ringTypes = $this->getRingType();

        $specProps['nameFunction'] = $this->getNameFunction($this->properties['jewelleryCategory']);
        $specProps['ringType'] = $ringTypes;
        $specProps['ringFinger'] = $this->getRingFinger($ringTypes);
        $specProps['metrics'] = $this->getMetrics();

        return $specProps;
    }

    /**
     * @throws RandomException
     */
    private function getMetrics(): array
    {
        $randNumElements = rand(2, count(RingSizeValuesEnum::cases()));
        $array = json_decode((string) json_encode(RingSizeValuesEnum::cases()), true);

        return $this->getSizeQuantity($array, $randNumElements);
    }

    private function getRingType(): string
    {
        $enumClass = get_class(RingTypeNamesEnum::SIGNET_RING);
        $enumCases = RingTypeNamesEnum::cases();

        return $this->getArrElement($enumCases, $enumClass);
    }

    /**
     * @throws RandomException
     */
    private function getRingFinger(string $ringType): string
    {
        if ($ringType === RingTypeNamesEnum::CLASSIC->value) {
            return random_int(0, 10) === 0 ? RingFingerNamesEnum::TOE->value : RingFingerNamesEnum::FINGER->value;
        } else {
            return RingFingerNamesEnum::FINGER->value;
        }
    }
}
