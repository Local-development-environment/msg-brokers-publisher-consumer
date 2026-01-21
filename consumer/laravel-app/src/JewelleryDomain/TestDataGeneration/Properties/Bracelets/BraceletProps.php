<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\Properties\Bracelets;

use JewelleryDomain\Jewellery\Shared\SpecProperties\Clasps\Enums\ClaspNamesEnum;
use JewelleryDomain\Jewellery\Shared\SpecProperties\Weavings\Enums\WeavingNamesEnum;
use JewelleryDomain\Jewellery\SpecProperties\Bracelets\BodyPart\Enums\BodyPartNamesEnum;
use JewelleryDomain\Jewellery\SpecProperties\Bracelets\BraceletBase\Enums\BraceletBaseNamesEnum;
use JewelleryDomain\Jewellery\SpecProperties\Bracelets\BraceletSize\Enums\BraceletSizeValuesEnum;
use JewelleryDomain\TestDataGeneration\PropertyGeneratorInterface;
use JewelleryDomain\TestDataGeneration\Traits\RandomArrayElementWithProbabilityTrait;
use JewelleryDomain\TestDataGeneration\Traits\SpecPropertyTrait;
use Random\RandomException;

final readonly class BraceletProps implements PropertyGeneratorInterface
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
        $specProps['braceletBase'] = $this->getBraceletBase();
        $specProps['clasp']        = $this->getClasp();
        $specProps['metrics']      = $this->getMetrics();
        $specProps['weaving']      = $this->getWeaving($specProps);
        $specProps['bodyPart']     = $this->getBodyPart();

        return $specProps;
    }

    private function getBraceletBase(): string
    {
        $enumClass = get_class(BraceletBaseNamesEnum::LEATHER);
        $enumCases = BraceletBaseNamesEnum::cases();

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
        $randNumElements = rand(2, count(BraceletSizeValuesEnum::cases()));
        $array           = json_decode((string)json_encode(BraceletSizeValuesEnum::cases()), true);

        return $this->getSizeQuantity($array, $randNumElements);
    }

    /**
     * @throws RandomException
     */
    private function getWeaving(array $specProps): array
    {
        $fullness = ['пустотелая', 'полнотелая'];

        if ($specProps['braceletBase'] === BraceletBaseNamesEnum::METAL_CHAIN->value) {
            $enumClass = get_class(WeavingNamesEnum::ANCHOR);
            $enumCases = WeavingNamesEnum::cases();

            return [
                'name'         => $this->getArrElement($enumCases, $enumClass),
                'fullness'     => $fullness[array_rand($fullness, 1)],
                'wireDiameter' => random_int(10, 40) / 10,
            ];
        } else {
            return [];
        }
    }

    private function getBodyPart(): string
    {
        $enumClass = get_class(BodyPartNamesEnum::WRIST);
        $enumCases = BodyPartNamesEnum::cases();

        return $this->getArrElement($enumCases, $enumClass);
    }
}
