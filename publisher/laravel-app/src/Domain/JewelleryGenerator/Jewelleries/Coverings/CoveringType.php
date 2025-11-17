<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\Coverings;

use Domain\Coverings\CoveringTypes\Enums\CoveringTypeBuilderEnum;
use Domain\JewelleryGenerator\Traits\ProbabilityArrayElementTrait;
use Domain\PreciousMetals\MetalTypes\Enums\MetalTypeBuilderEnum;
use Illuminate\Support\Arr;

final class CoveringType
{
    use ProbabilityArrayElementTrait;

    public function getCoveringType(object $properties): array
    {
        $metalTypeName = $properties->metalTypeName;
//        dd(MetalTypeBuilderEnum::SILVER->coverings());

        if ($metalTypeName === MetalTypeBuilderEnum::SILVER->value) {

            return $this->getSilverJewelleryCovering();

        } elseif ($metalTypeName === MetalTypeBuilderEnum::GOLDEN->value) {

            return $this->getGoldenJewelleryCovering();

        } elseif ($metalTypeName === MetalTypeBuilderEnum::PLATINUM->value) {
            return [];
        } else {
            return [];
        }

    }

    private function getSilverJewelleryCovering(): array|null
    {
        $coverings = [];
        $anyCovering = $this->getAnySilverCovering();
        $coverings[] = $anyCovering;

        if ($anyCovering === CoveringTypeBuilderEnum::DIAMOND_CUT->value) {
            $coverings[] = $this->getAddedCoveringToDiamondCut();
        }

        return $coverings;
    }

    private function splittingByCoveringFunction(string $coveringTypes, string $coveringFunction): array|null
    {
        $arrCoverings = explode(',', $coveringTypes);

        foreach ($arrCoverings as $key => $covering) {
            if (!str_contains($coveringFunction, $covering)) {
                Arr::forget($arrCoverings, $key);
            }
        }

        return $arrCoverings;
    }

    private function getAnySilverCovering(): string|null
    {
        $arrCoverings = explode(',', MetalTypeBuilderEnum::SILVER->coverings());

        $randNum = rand(1, 100);

        if ($randNum < 20) {
            return $arrCoverings[0]; // diamond cut
        } elseif ($randNum < 25) {
            return $arrCoverings[1]; // enamel
        } elseif ($randNum < 40) {
            return $arrCoverings[2]; // golding
        } elseif ($randNum < 80) {
            return $arrCoverings[3]; // rhodium platting
        } else {
            return $arrCoverings[4]; // oxidation
        }
    }

    private function getGoldenJewelleryCovering(): array|null
    {
        $randNum = rand(1, 100);

        if ($randNum < 5) {
            return [CoveringTypeBuilderEnum::ENAMEL->value];
        } elseif ($randNum < 40) {
            return [
                CoveringTypeBuilderEnum::DIAMOND_CUT->value,
                CoveringTypeBuilderEnum::RHODIUM_PLATING->value
            ];
        } else {
            return [CoveringTypeBuilderEnum::RHODIUM_PLATING->value];
        }
    }

    private function getAddedCoveringToDiamondCut(): string|null
    {
        $randNum = rand(1, 100);

        if ($randNum < 30) {
            return CoveringTypeBuilderEnum::RHODIUM_PLATING->value;
        } elseif ($randNum < 80) {
            return CoveringTypeBuilderEnum::OXIDATION->value;
        } else {
            return CoveringTypeBuilderEnum::GOLDING->value;
        }
    }
}
