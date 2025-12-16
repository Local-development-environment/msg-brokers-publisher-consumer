<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\MetalItems;

use Domain\Jewelleries\Categories\Enums\CategoryBuilderEnum;
use Domain\JewelleryGenerator\Traits\ProbabilityArrayElementTrait;
use Domain\PreciousMetals\Coverages\Enums\CoverageBuilderEnum;
use Domain\PreciousMetals\Hallmarks\Enums\HallmarkBuilderEnum;
use Domain\PreciousMetals\PreciousMetals\Enums\PreciousMetalBuilderEnum;
use Illuminate\Support\Arr;

final class MetalItem
{
    use ProbabilityArrayElementTrait;

    public function metalItem(string $category): array
    {
        $preciousMetal = $this->getPreciousMetal();
        $hallmark      = $this->getHallmark($preciousMetal);
        $coverages     = $this->getCoverage($preciousMetal, $category);

        return [
            'preciousMetals' => [
                [
                    'hallmark'      => $hallmark,
                    'preciousMetal' => $preciousMetal,
                ],
            ],
            'coverages'      => $coverages
        ];
    }

    private function getPreciousMetal(): string
    {
        $enumClass = get_class(PreciousMetalBuilderEnum::GOLDEN_RED);
        $enumCases = PreciousMetalBuilderEnum::cases();

        return $this->getArrElement($enumCases, $enumClass);
    }

    private function getHallmark(string $preciousMetal): int
    {
        $enumClass = get_class(HallmarkBuilderEnum::H_375);
        $enumCases = HallmarkBuilderEnum::cases();

        foreach ($enumCases as $key => $case) {

            if (!in_array($preciousMetal, $case::{$case->name}->metals()) ||
                $case::{$case->name}->value === HallmarkBuilderEnum::H_999->value) {
                Arr::forget($enumCases, $key);
            }

            if ($preciousMetal === PreciousMetalBuilderEnum::GOLDEN_RED->value &&
                $case::{$case->name}->value === HallmarkBuilderEnum::H_500->value) {
                Arr::forget($enumCases, $key);
            }

            if ($preciousMetal === PreciousMetalBuilderEnum::PLATINUM->value &&
                $case::{$case->name}->value === HallmarkBuilderEnum::H_585->value) {
                Arr::forget($enumCases, $key);
            }

            if ($preciousMetal === PreciousMetalBuilderEnum::PLATINUM->value &&
                $case::{$case->name}->value === HallmarkBuilderEnum::H_850->value) {
                Arr::forget($enumCases, $key);
            }
        }

        return $this->getArrElement($enumCases, $enumClass);
    }

    private function getCoverage(string $metalType, string $category): array
    {
        if ($category === CategoryBuilderEnum::BEADS->value) {
            return [CoverageBuilderEnum::RHODIUM_PLATING->value];
        }

        if ($metalType === PreciousMetalBuilderEnum::PLATINUM->value ||
            $metalType === PreciousMetalBuilderEnum::PALLADIUM->value) {

            return rand(0, 1) ? [] : [CoverageBuilderEnum::DIAMOND_CUT->value];

        } elseif ($metalType === PreciousMetalBuilderEnum::SILVER->value) {

            return $this->getSilverCovering(PreciousMetalBuilderEnum::SILVER->coverages());

        } elseif ($metalType === PreciousMetalBuilderEnum::GOLDEN_YELLOW->value ||
            $metalType === PreciousMetalBuilderEnum::GOLDEN_RED->value ||
            $metalType === PreciousMetalBuilderEnum::GOLDEN_WHITE->value) {

            return $this->getGoldCovering(PreciousMetalBuilderEnum::GOLDEN_RED->coverages());

        }

        return [];
    }

    private function getSilverCovering(array $coverages): array
    {
        $randNum = rand(0, 4);
        $items   = [];

        $preparedCoverages = $this->prepareCoverages($coverages);

        if ($randNum === 0) {
            $items[] = CoverageBuilderEnum::DIAMOND_CUT->value;
            $items[] = rand(0, 1) ? CoverageBuilderEnum::OXIDATION->value : CoverageBuilderEnum::RHODIUM_PLATING->value;

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
            $items[] = CoverageBuilderEnum::DIAMOND_CUT->value;
            $items[] = CoverageBuilderEnum::RHODIUM_PLATING->value;

            return $items;
        } elseif ($randNum === 1) {
            $items[] = CoverageBuilderEnum::ENAMEL->value;
            $items[] = CoverageBuilderEnum::RHODIUM_PLATING->value;
            return $items;
        } else {
            return [$preparedCoverages[array_rand($preparedCoverages)]];
        }
    }

    private function prepareCoverages(array $coverages): array
    {
        foreach ($coverages as $key => $coverage) {
            if ($coverage === CoverageBuilderEnum::DIAMOND_CUT->value) {
                unset($coverages[$key]);
            }

            if ($coverage === CoverageBuilderEnum::ENAMEL->value) {
                unset($coverages[$key]);
            }
        }

        return $coverages;
    }
}