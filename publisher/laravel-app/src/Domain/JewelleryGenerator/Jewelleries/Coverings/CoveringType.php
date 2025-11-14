<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\Coverings;

use Domain\Coverings\CoveringShades\Enums\CoveringShadeListEnum;
use Domain\Coverings\CoveringTypes\Enums\CoveringTypeListEnum;
use Domain\JewelleryGenerator\Traits\ProbabilityArrayElementTrait;
use Domain\PreciousMetals\MetalTypes\Enums\MetalTypeListEnum;
use Random\RandomException;

final class CoveringType
{
    use ProbabilityArrayElementTrait;

    public function getCoveringType($properties): array
    {
        $metal = $properties['metalType'];
        $category = $properties['category'];

        $temp = [];

        if ($category === 'бусы') {
            return [];
        }

        $key = $this->getCoverings($metal);
        $covering = CoveringTypeListEnum::cases()[$key]->value;
        $randFunction = rand(1, 100);

        if ($randFunction < 10) {
            return [];
        } elseif ($covering === CoveringTypeListEnum::DIAMOND_CUT->value || $covering === CoveringTypeListEnum::ENAMEL->value) {
            $temp[] = $covering;
            if ($metal === MetalTypeListEnum::SILVER->value) {
                $randNum = rand(1, 100);
                if ($randNum < 40) {
                    return $temp;
                } elseif ($randNum < 70) {
                    $temp[] = CoveringTypeListEnum::OXIDATION->value;
                    return $temp;
                } else {
                    $temp[] = CoveringTypeListEnum::RHODIUM_PLATING->value;
                    return $temp;
                }
            }
        } else {
            $temp[] = $covering;
        }

        return $temp;
    }

    private function getCoverings(string $metal): int|null
    {
        $randNum = rand(1, 100);
        if (MetalTypeListEnum::SILVER->value === $metal) {
            if ($randNum < 5) {
                return 0;
            } elseif ($randNum < 20) {
                return 1;
            } elseif ($randNum < 40) {
                return 2;
            } elseif ($randNum < 60) {
                return 3;
            } elseif ($randNum < 70) {
                return 4;
            } elseif ($randNum < 80) {
                return 5;
            } elseif ($randNum < 90) {
                return 6;
            } else {
                return 7;
            }
        } elseif (MetalTypeListEnum::GOLDEN->value === $metal) {
            if ($randNum < 30) {
                return 3;
            } elseif ($randNum < 65) {
                return 4;
            } elseif ($randNum < 85) {
                return 6;
            } else {
                return 7;
            }
        } elseif (MetalTypeListEnum::PLATINUM->value === $metal) {
            if ($randNum < 50) {
                return 6;
            } else {
                return 7;
            }
        } else {
            if ($randNum < 50) {
                return 6;
            } else {
                return 7;
            }
        }
    }
}
