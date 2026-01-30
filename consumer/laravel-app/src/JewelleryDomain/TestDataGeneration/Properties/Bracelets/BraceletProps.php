<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\Properties\Bracelets;

use JewelleryDomain\Jewellery\Shared\SpecProperties\Clasps\Enums\ClaspNamesEnum;
use JewelleryDomain\Jewellery\Shared\SpecProperties\Weavings\Enums\WeavingNamesEnum;
use JewelleryDomain\Jewellery\SpecProperties\Bracelets\BodyPart\Enums\BodyPartNamesEnum;
use JewelleryDomain\Jewellery\SpecProperties\Bracelets\BraceletSize\Enums\BraceletSizeValuesEnum;
use JewelleryDomain\Jewellery\SpecProperties\Bracelets\BraceletType\Enums\BraceletTypeNamesEnum;
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

        $braceletType = $this->getBraceletType();

        $specProps['nameFunction'] = $this->getNameFunction($this->properties['jewelleryCategory']);
        $specProps['braceletType'] = $braceletType;
        $specProps['clasp']        = $this->getClasp($braceletType);
        $specProps['metrics']      = $this->getMetrics();
        $specProps['weaving']      = $this->getWeaving($braceletType);
        $specProps['bodyPart']     = $this->getBodyPart($braceletType);

        return $specProps;
    }

    private function getBraceletType(): string
    {
        $enumClass = get_class(BraceletTypeNamesEnum::CHAINED);
        $enumCases = BraceletTypeNamesEnum::cases();

        return $this->getArrElement($enumCases, $enumClass);
    }

    private function getClasp(string $braceletType): string | null
    {
        if ($braceletType === BraceletTypeNamesEnum::CHAINED->value ||
            $braceletType === BraceletTypeNamesEnum::WICKER->value ||
            $braceletType === BraceletTypeNamesEnum::GLIDER->value ||
            $braceletType === BraceletTypeNamesEnum::SLAVE->value ) {

            $enumClass = get_class(ClaspNamesEnum::CARABINER);
            $enumCases = ClaspNamesEnum::cases();

            return $this->getArrElement($enumCases, $enumClass);
        }

        return null;
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
    private function getWeaving(string $braceletType): array
    {
        $fullness = ['пустотелая', 'полнотелая'];

        if ($braceletType === BraceletTypeNamesEnum::CHAINED->value) {
            $enumClass = get_class(WeavingNamesEnum::ANCHOR);
            $enumCases = WeavingNamesEnum::cases();

            return [
                'name'         => $this->getArrElement($enumCases, $enumClass),
                'fullness'     => $fullness[array_rand($fullness, 1)],
                'wireDiameter' => rand(10, 40) / 10,
            ];
        } else {
            return [];
        }
    }

    private function getBodyPart(string $braceletType): string
    {
        if ($braceletType === BraceletTypeNamesEnum::CHAINED->value ||
            $braceletType === BraceletTypeNamesEnum::WICKER->value ||
            $braceletType === BraceletTypeNamesEnum::GLIDER->value ||
            $braceletType === BraceletTypeNamesEnum::UNCLOSED_RING->value ) {

            $enumClass = get_class(BodyPartNamesEnum::WRIST);
            $enumCases = BodyPartNamesEnum::cases();

            return $this->getArrElement($enumCases, $enumClass);
        }

        return BodyPartNamesEnum::WRIST->value;
    }
}
