<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\CoverageItems;

use JewelleryDomain\Jewellery\CoverageItems\Coverage\Enums\CoverageNamesEnum;
use JewelleryDomain\Jewellery\CoverageItems\CoverageType\Enums\CoverageTypeNamesEnum;
use JewelleryDomain\Jewellery\JewelleryCategoryItems\JewelleryCategory\Enums\JewelleryCategoryNamesEnum;
use JewelleryDomain\Jewellery\PreciousMetalItems\PreciousMetal\Enums\PreciousMetalNamesEnum;
use JewelleryDomain\Jewellery\SpecProperties\Bracelets\BraceletType\Enums\BraceletTypeNamesEnum;
use JewelleryDomain\TestDataGeneration\CoverageItems\MetalCoverages\GoldCoverage;
use JewelleryDomain\TestDataGeneration\CoverageItems\MetalCoverages\PalladiumCoverage;
use JewelleryDomain\TestDataGeneration\CoverageItems\MetalCoverages\PlatinumCoverage;
use JewelleryDomain\TestDataGeneration\CoverageItems\MetalCoverages\SilverCoverage;
use JewelleryDomain\TestDataGeneration\Traits\RandomArrayElementWithProbabilityTrait;
use JewelleryDomain\TestDataGeneration\Traits\SpecPropertyTrait;
use Random\RandomException;

final readonly class CoverageGenerator
{
    use RandomArrayElementWithProbabilityTrait, SpecPropertyTrait;

    public function __construct(protected array $properties)
    {
    }

    /**
     * @throws RandomException
     */
    public function getCoverages(): array
    {
        return match ($this->properties['jewelleryCategory']) {
            JewelleryCategoryNamesEnum::BEADS->value          => $this->getCoverageBead(),
            JewelleryCategoryNamesEnum::BRACELETS->value      => $this->getCoverageBracelet($this->properties),
            JewelleryCategoryNamesEnum::BROOCHES->value       => $this->getCoverageBrooch($this->properties),
            JewelleryCategoryNamesEnum::CHAINS->value         => $this->getCoverageChain($this->properties),
            JewelleryCategoryNamesEnum::CHARM_PENDANTS->value => $this->getCoverageCharmPendant($this->properties),
            JewelleryCategoryNamesEnum::CUFF_LINKS->value     => $this->getCoverageCuffLink($this->properties),
            JewelleryCategoryNamesEnum::EARRINGS->value       => $this->getCoverageEarring($this->properties),
            JewelleryCategoryNamesEnum::NECKLACES->value      => $this->getCoverageNecklace($this->properties),
            JewelleryCategoryNamesEnum::PENDANTS->value       => $this->getCoveragePendant($this->properties),
            JewelleryCategoryNamesEnum::PIERCINGS->value      => $this->getCoveragePiercing($this->properties),
            JewelleryCategoryNamesEnum::RINGS->value          => $this->getCoverageRing($this->properties),
            JewelleryCategoryNamesEnum::TIE_CLIPS->value      => $this->getCoverageTieClip($this->properties),
        };
    }

    private function getCoverageBead(): array
    {
        return [
            CoverageNamesEnum::RHODIUM_PLATING->value
        ];
    }

    /**
     * @throws RandomException
     */
    private function getCoverageBracelet(array $properties): array
    {
        if ($properties['property']['braceletType'] === BraceletTypeNamesEnum::WICKER->value) {
            return [
                CoverageNamesEnum::RHODIUM_PLATING->value
            ];
        } else {
            $metal = $properties['preciousMetals'][0]['preciousMetal'];
            return match ($metal) {
                PreciousMetalNamesEnum::GOLDEN_YELLOW->value,
                PreciousMetalNamesEnum::GOLDEN_RED->value,
                PreciousMetalNamesEnum::GOLDEN_WHITE->value => (new GoldCoverage)->getGoldCoverage(),
                PreciousMetalNamesEnum::SILVER->value       => (new SilverCoverage())->getSilverCoverage(),
                PreciousMetalNamesEnum::PLATINUM->value     => (new PlatinumCoverage())->getPlatinumCoverage(),
                PreciousMetalNamesEnum::PALLADIUM->value    => (new PalladiumCoverage())->getPalladiumCoverage(),
            };
        }
    }

    /**
     * @throws RandomException
     */
    private function getCoverageBrooch(array $properties): array
    {
        $metal = $properties['preciousMetals'][0]['preciousMetal'];

        return match ($metal) {
            PreciousMetalNamesEnum::GOLDEN_YELLOW->value,
            PreciousMetalNamesEnum::GOLDEN_RED->value,
            PreciousMetalNamesEnum::GOLDEN_WHITE->value => (new GoldCoverage)->getGoldCoverage(),
            PreciousMetalNamesEnum::SILVER->value       => (new SilverCoverage())->getSilverCoverage(),
            PreciousMetalNamesEnum::PLATINUM->value     => (new PlatinumCoverage())->getPlatinumCoverage(),
            PreciousMetalNamesEnum::PALLADIUM->value    => (new PalladiumCoverage())->getPalladiumCoverage(),
        };
    }

    /**
     * @throws RandomException
     */
    private function getCoverageChain(array $properties): array
    {
        $metal = $properties['preciousMetals'][0]['preciousMetal'];

        return match ($metal) {
            PreciousMetalNamesEnum::GOLDEN_YELLOW->value,
            PreciousMetalNamesEnum::GOLDEN_RED->value,
            PreciousMetalNamesEnum::GOLDEN_WHITE->value => (new GoldCoverage)->getGoldCoverage(enamel: false),
            PreciousMetalNamesEnum::SILVER->value       => (new SilverCoverage())->getSilverCoverage(enamel: false),
            PreciousMetalNamesEnum::PLATINUM->value     => (new PlatinumCoverage())->getPlatinumCoverage(),
            PreciousMetalNamesEnum::PALLADIUM->value    => (new PalladiumCoverage())->getPalladiumCoverage(),
        };
    }

    /**
     * @throws RandomException
     */
    private function getCoverageCharmPendant(array $properties): array
    {
        $metal = $properties['preciousMetals'][0]['preciousMetal'];

        return match ($metal) {
            PreciousMetalNamesEnum::GOLDEN_YELLOW->value,
            PreciousMetalNamesEnum::GOLDEN_RED->value,
            PreciousMetalNamesEnum::GOLDEN_WHITE->value => (new GoldCoverage)->getGoldCoverage(),
            PreciousMetalNamesEnum::SILVER->value       => (new SilverCoverage())->getSilverCoverage(),
            PreciousMetalNamesEnum::PLATINUM->value     => (new PlatinumCoverage())->getPlatinumCoverage(),
            PreciousMetalNamesEnum::PALLADIUM->value    => (new PalladiumCoverage())->getPalladiumCoverage(),
        };
    }

    /**
     * @throws RandomException
     */
    private function getCoverageCuffLink(array $properties): array
    {
        $metal = $properties['preciousMetals'][0]['preciousMetal'];

        return match ($metal) {
            PreciousMetalNamesEnum::GOLDEN_YELLOW->value,
            PreciousMetalNamesEnum::GOLDEN_RED->value,
            PreciousMetalNamesEnum::GOLDEN_WHITE->value => (new GoldCoverage)->getGoldCoverage(),
            PreciousMetalNamesEnum::SILVER->value       => (new SilverCoverage())->getSilverCoverage(),
            PreciousMetalNamesEnum::PLATINUM->value     => (new PlatinumCoverage())->getPlatinumCoverage(),
            PreciousMetalNamesEnum::PALLADIUM->value    => (new PalladiumCoverage())->getPalladiumCoverage(),
        };
    }

    /**
     * @throws RandomException
     */
    private function getCoverageEarring(array $properties): array
    {
        $metal = $properties['preciousMetals'][0]['preciousMetal'];

        return match ($metal) {
            PreciousMetalNamesEnum::GOLDEN_YELLOW->value,
            PreciousMetalNamesEnum::GOLDEN_RED->value,
            PreciousMetalNamesEnum::GOLDEN_WHITE->value => (new GoldCoverage)->getGoldCoverage(),
            PreciousMetalNamesEnum::SILVER->value       => (new SilverCoverage())->getSilverCoverage(),
            PreciousMetalNamesEnum::PLATINUM->value     => (new PlatinumCoverage())->getPlatinumCoverage(),
            PreciousMetalNamesEnum::PALLADIUM->value    => (new PalladiumCoverage())->getPalladiumCoverage(),
        };
    }

    /**
     * @throws RandomException
     */
    private function getCoverageNecklace(array $properties): array
    {
        $metal = $properties['preciousMetals'][0]['preciousMetal'];

        return match ($metal) {
            PreciousMetalNamesEnum::GOLDEN_YELLOW->value,
            PreciousMetalNamesEnum::GOLDEN_RED->value,
            PreciousMetalNamesEnum::GOLDEN_WHITE->value => (new GoldCoverage)->getGoldCoverage(),
            PreciousMetalNamesEnum::SILVER->value       => (new SilverCoverage())->getSilverCoverage(),
            PreciousMetalNamesEnum::PLATINUM->value     => (new PlatinumCoverage())->getPlatinumCoverage(),
            PreciousMetalNamesEnum::PALLADIUM->value    => (new PalladiumCoverage())->getPalladiumCoverage(),
        };
    }

    /**
     * @throws RandomException
     */
    private function getCoveragePendant(array $properties): array
    {
        $metal = $properties['preciousMetals'][0]['preciousMetal'];

        return match ($metal) {
            PreciousMetalNamesEnum::GOLDEN_YELLOW->value,
            PreciousMetalNamesEnum::GOLDEN_RED->value,
            PreciousMetalNamesEnum::GOLDEN_WHITE->value => (new GoldCoverage)->getGoldCoverage(),
            PreciousMetalNamesEnum::SILVER->value       => (new SilverCoverage())->getSilverCoverage(),
            PreciousMetalNamesEnum::PLATINUM->value     => (new PlatinumCoverage())->getPlatinumCoverage(),
            PreciousMetalNamesEnum::PALLADIUM->value    => (new PalladiumCoverage())->getPalladiumCoverage(),
        };
    }

    private function getCoveragePiercing(array $properties): array
    {
        return [
            [CoverageNamesEnum::RHODIUM_PLATING->value],
        ];
    }

    /**
     * @throws RandomException
     */
    private function getCoverageRing(array $properties): array
    {
        $metal = $properties['preciousMetals'][0]['preciousMetal'];

        return match ($metal) {
            PreciousMetalNamesEnum::GOLDEN_YELLOW->value,
            PreciousMetalNamesEnum::GOLDEN_RED->value,
            PreciousMetalNamesEnum::GOLDEN_WHITE->value => (new GoldCoverage)->getGoldCoverage(),
            PreciousMetalNamesEnum::SILVER->value       => (new SilverCoverage())->getSilverCoverage(),
            PreciousMetalNamesEnum::PLATINUM->value     => (new PlatinumCoverage())->getPlatinumCoverage(),
            PreciousMetalNamesEnum::PALLADIUM->value    => (new PalladiumCoverage())->getPalladiumCoverage(),
        };
    }

    /**
     * @throws RandomException
     */
    private function getCoverageTieClip(array $properties): array
    {
        $metal = $properties['preciousMetals'][0]['preciousMetal'];

        return match ($metal) {
            PreciousMetalNamesEnum::GOLDEN_YELLOW->value,
            PreciousMetalNamesEnum::GOLDEN_RED->value,
            PreciousMetalNamesEnum::GOLDEN_WHITE->value => (new GoldCoverage)->getGoldCoverage(),
            PreciousMetalNamesEnum::SILVER->value       => (new SilverCoverage())->getSilverCoverage(),
            PreciousMetalNamesEnum::PLATINUM->value     => (new PlatinumCoverage())->getPlatinumCoverage(),
            PreciousMetalNamesEnum::PALLADIUM->value    => (new PalladiumCoverage())->getPalladiumCoverage(),
        };
    }
}
