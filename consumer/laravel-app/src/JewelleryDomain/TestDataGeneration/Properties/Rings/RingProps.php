<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\Properties\Rings;

use JewelleryDomain\Jewellery\SpecProperties\Rings\RingFinger\Enums\RingFingerNamesEnum;
use JewelleryDomain\Jewellery\SpecProperties\Rings\RingSize\Enums\RingSizeValuesEnum;
use JewelleryDomain\Jewellery\SpecProperties\Rings\RingSpecific\Enums\RingSpecificNamesEnum;
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
        $specProps['ringType']     = $ringTypes;
        $specProps['ringSpecific'] = $this->getRingSpecific($ringTypes);
        $specProps['metrics']      = $this->getMetrics();

        return $specProps;
    }

    /**
     * @throws RandomException
     */
    private function getMetrics(): array
    {
        $randNumElements = rand(2, count(RingSizeValuesEnum::cases()));
        $array           = json_decode((string)json_encode(RingSizeValuesEnum::cases()), true);

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
    private function getRingSpecific(string $ringType): array
    {
        return match ($ringType) {
            RingTypeNamesEnum::CLASSIC->value      => $this->getClassicSpecific(),
            RingTypeNamesEnum::PHALANX->value      => $this->getPhalanxSpecific(),
            RingTypeNamesEnum::KNUCKLE->value      => $this->getKnuckleSpecific(),
            RingTypeNamesEnum::MASSIVE_RING->value => $this->getMassiveRingSpecific(),
            RingTypeNamesEnum::SIGNET_RING->value  => $this->getSignetRingSpecific(),
            RingTypeNamesEnum::PEDICLET->value     => $this->getPedicletSpecific(),
        };
    }

    /**
     * @throws RandomException
     */
    private function getClassicSpecific(): array
    {
        $num = random_int(1, 100);

        return match (true) {
            $num < 10 => [RingSpecificNamesEnum::ENGAGEMENT->value, RingSpecificNamesEnum::COMBINATION->value],
            $num < 20 => [RingSpecificNamesEnum::WEDDING->value, RingSpecificNamesEnum::COMBINATION->value],
            $num < 70 => random_int(0, 1) === 0 ? [RingSpecificNamesEnum::ENGAGEMENT->value] : [RingSpecificNamesEnum::WEDDING->value],
            $num < 80 => [RingSpecificNamesEnum::COMBINATION->value],
            $num < 90 => [RingSpecificNamesEnum::SET_RING->value],
            $num < 100 => [],
        };
    }

    /**
     * @throws RandomException
     */
    private function getPhalanxSpecific(): array
    {
        return [
            random_int(0, 10) === 0 ? [RingSpecificNamesEnum::COMBINATION->value] : [],
        ];
    }

    /**
     * @throws RandomException
     */
    private function getKnuckleSpecific(): array
    {
        return [
            random_int(0, 10) === 0 ? [RingSpecificNamesEnum::COMBINATION->value] : [],
        ];
    }

    /**
     * @throws RandomException
     */
    private function getMassiveRingSpecific(): array
    {
        return [
            random_int(0, 10) === 0 ? [RingSpecificNamesEnum::COMBINATION->value] : [],
        ];
    }

    /**
     * @throws RandomException
     */
    private function getSignetRingSpecific(): array
    {
        return [
            random_int(0, 10) === 0 ? [RingSpecificNamesEnum::COMBINATION->value] : [],
        ];
    }

    /**
     * @throws RandomException
     */
    private function getPedicletSpecific(): array
    {
        $num = random_int(1, 100);

        return match (true) {
            $num < 10 => [RingSpecificNamesEnum::COMBINATION->value],
            $num < 20 => [RingSpecificNamesEnum::SET_RING->value],
            $num < 100 => [],
        };
    }
}
