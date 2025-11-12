<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\PreciousMetals;

use Domain\JewelleryGenerator\Traits\ProbabilityArrayElementTrait;
use Domain\PreciousMetals\MetalColours\Enums\GoldenColourListEnum;
use Domain\PreciousMetals\MetalTypes\Enums\MetalTypeListEnum;
use Illuminate\Support\Arr;
use Random\RandomException;

final class GoldenColour
{
    use ProbabilityArrayElementTrait;

    /**
     * @throws RandomException
     */
    public function getGoldenColour($hallmark, $metal): array
    {
        if ($metal !== MetalTypeListEnum::GOLDEN->value) {
            return [];
        }

        $colours = [];

        $enumClass = get_class(GoldenColourListEnum::RED);
        $enumCases = GoldenColourListEnum::cases();

        $numColours = $this->randCombinedColours();

        if ($numColours === 3) {
            $colours[] = GoldenColourListEnum::RED->value;
            $colours[] = GoldenColourListEnum::WHITE->value;
            $colours[] = GoldenColourListEnum::YELLOW->value;
        }

        if ($numColours === 1) {
            $colours[] = $this->getArrElement($enumClass, $this->removeItem($enumCases));
        }

        if ($numColours === 2) {
            $i = 1;

            do {
                $colours[] = $this->getArrElement($enumClass, $this->removeItem($enumCases));
                $i++;
                if (count($colours) > 1) {
                    if (count($colours) !== count(array_unique($colours))) {
                        Arr::forget($colours, array_key_last($colours));
                    } else {
                        break;
                    }
                }
            } while ($i < 50);
        }

        return $colours;
    }

    /**
     * @throws RandomException
     */
    private function randCombinedColours(): int
    {
        $randNumberColours = random_int(1, 100);
        dump($randNumberColours);
        if ($randNumberColours < 20) {
            return 1;
        } elseif ($randNumberColours < 70) {
            return 2;
        } else {
            return 3;
        }
    }

    private function removeItem($enumCases): array
    {
        foreach ($enumCases as $key => $case) {
            if ($case->value === GoldenColourListEnum::PINK->value) {
                Arr::forget($enumCases, $key);
            }
        }

        return $enumCases;
    }
}
