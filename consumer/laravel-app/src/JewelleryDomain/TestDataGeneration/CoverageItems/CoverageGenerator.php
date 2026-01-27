<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\CoverageItems;

use JewelleryDomain\Jewellery\CoverageItems\Coverage\Enums\CoverageNamesEnum;
use JewelleryDomain\Jewellery\JewelleryCategoryItems\JewelleryCategory\Enums\JewelleryCategoryNamesEnum;
use JewelleryDomain\Jewellery\PreciousMetalItems\PreciousMetal\Enums\PreciousMetalNamesEnum;

final class CoverageGenerator
{
    public function getCoverages(array $properties): array
    {
        $preciousMetal = data_get($properties, 'preciousMetals.*.preciousMetal');
        $category      = data_get($properties, 'jewelleryCategory');

        return $this->getRandomCoverage($preciousMetal, $category);
    }

    private function getRandomCoverage(array $metalType, string $category): array
    {
        if ($category === JewelleryCategoryNamesEnum::BEADS->value) {
            return [CoverageNamesEnum::RHODIUM_PLATING->value];
        }

        if ($metalType[0] === PreciousMetalNamesEnum::PLATINUM->value ||
            $metalType[0] === PreciousMetalNamesEnum::PALLADIUM->value) {

            return rand(0, 3) ? [] : [CoverageNamesEnum::DIAMOND_CUT->value];

        } elseif ($metalType[0] === PreciousMetalNamesEnum::SILVER->value) {

            return $this->getSilverCovering(PreciousMetalNamesEnum::SILVER->coverages());

        } elseif ($metalType[0] === PreciousMetalNamesEnum::GOLDEN_YELLOW->value ||
            $metalType[0] === PreciousMetalNamesEnum::GOLDEN_RED->value ||
            $metalType[0] === PreciousMetalNamesEnum::GOLDEN_WHITE->value) {

            return $this->getGoldCovering(PreciousMetalNamesEnum::GOLDEN_RED->coverages());

        }

        return [];
    }

    private function getSilverCovering(array $coverages): array
    {
        $randNum = rand(0, 4);
        $items   = [];

        $preparedCoverages = $this->prepareCoverages($coverages);

        if ($randNum === 0) {
            $items[] = CoverageNamesEnum::DIAMOND_CUT->value;
            $items[] = rand(0, 1) ? CoverageNamesEnum::OXIDATION->value : CoverageNamesEnum::RHODIUM_PLATING->value;

            return $items;
        } else {
            return [$preparedCoverages[array_rand($preparedCoverages)]];
        }
    }

    private function getGoldCovering(array $coverages): array
    {
        $randNum = rand(0, 4);
        $items   = [];

        $preparedCoverages = $this->prepareCoverages($coverages);
        if ($randNum === 0) {
            $items[] = CoverageNamesEnum::DIAMOND_CUT->value;
            $items[] = CoverageNamesEnum::RHODIUM_PLATING->value;

            return $items;
        } elseif ($randNum === 1) {
            $items[] = CoverageNamesEnum::ENAMEL->value;
            $items[] = CoverageNamesEnum::RHODIUM_PLATING->value;

            return $items;
        } else {
            return [$preparedCoverages[array_rand($preparedCoverages)]];
        }
    }

    private function prepareCoverages(array $coverages): array
    {
        foreach ($coverages as $key => $coverage) {
            if ($coverage === CoverageNamesEnum::DIAMOND_CUT->value) {
                unset($coverages[$key]);
            }

            if ($coverage === CoverageNamesEnum::ENAMEL->value) {
                unset($coverages[$key]);
            }
        }

        return $coverages;
    }
}
