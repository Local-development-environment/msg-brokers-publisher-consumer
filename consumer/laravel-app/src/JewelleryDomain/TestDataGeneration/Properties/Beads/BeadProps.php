<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\Properties\Beads;

use JewelleryDomain\Jewellery\JewelleryCategoryItems\JewelleryCategory\Enums\JewelleryCategoryNamesEnum;
use JewelleryDomain\Jewellery\Shared\SpecProperties\Clasps\Clasp\Enums\ClaspNamesEnum;
use JewelleryDomain\Jewellery\Shared\SpecProperties\NeckSizes\NeckSize\Enums\NeckSizeValuesEnum;
use JewelleryDomain\Jewellery\SpecProperties\Beads\BeadBase\Enums\BeadBaseNamesEnum;
use JewelleryDomain\TestDataGeneration\PropertyGeneratorInterface;
use JewelleryDomain\TestDataGeneration\Traits\RandomArrayElementWithProbabilityTrait;
use Random\RandomException;

final readonly class BeadProps implements PropertyGeneratorInterface
{
    use RandomArrayElementWithProbabilityTrait;

    public function __construct(private array $properties)
    {
    }

    public function getProps(): array
    {
        $specProps = [];

        $specProps['name-function'] = $this->getNameFunction($this->properties['jewelleryCategory']);
        $specProps['beadBaseName'] = $this->getBeadBase();
        $specProps['claspName'] = $this->getClasp();
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
        $metrics = [];
        $randNumElements = rand(2, count(NeckSizeValuesEnum::cases()));
        $array = json_decode((string) json_encode(NeckSizeValuesEnum::cases()), true);
        $randSizes = array_rand($array, $randNumElements);
        
        $result = array_intersect_key(
            $array,
            array_flip($randSizes)
        );
        $i = 0;
        foreach ($result as $key => $value) {
            $metrics[$key]['size'] = $value;
            $metrics[$key]['quantity'] = random_int(0, 10);
        }

        return array_values($metrics);

    }

    private function getNameFunction($category): string
    {
        return match ($category) {
            JewelleryCategoryNamesEnum::BRACELETS->value      => 'getBraceletProps',
            JewelleryCategoryNamesEnum::BROOCHES->value       => 'getBroochProps',
            JewelleryCategoryNamesEnum::TIE_CLIPS->value      => 'getTieClipProps',
            JewelleryCategoryNamesEnum::CUFF_LINKS->value     => 'getCuffLinkProps',
            JewelleryCategoryNamesEnum::NECKLACES->value      => 'getNecklaceProps',
            JewelleryCategoryNamesEnum::RINGS->value          => 'getRingProps',
            JewelleryCategoryNamesEnum::PIERCINGS->value      => 'getPiercingProps',
            JewelleryCategoryNamesEnum::PENDANTS->value       => 'getPendantProps',
            JewelleryCategoryNamesEnum::CHARM_PENDANTS->value => 'getCharmPendantProps',
            JewelleryCategoryNamesEnum::EARRINGS->value       => 'getEarringProps',
            JewelleryCategoryNamesEnum::CHAINS->value         => 'getChainProps',
            JewelleryCategoryNamesEnum::BEADS->value          => 'getBeadProps',
        };
    }
}
