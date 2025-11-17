<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\Metals;

use Domain\JewelleryGenerator\Traits\ProbabilityArrayElementTrait;
use Domain\PreciousMetals\GoldenColours\Enums\GoldenColourBuilderEnum;
use Domain\PreciousMetals\GoldenColours\Enums\GoldenColourEnum;
use Domain\PreciousMetals\MetalTypes\Enums\MetalTypeBuilderEnum;
use Illuminate\Support\Facades\DB;
use Random\RandomException;

final class GoldenColour
{
    use ProbabilityArrayElementTrait;

    /**
     * @throws RandomException
     */
    public function getGoldenColour(string $metalTypeName): ?array
    {
        if ($metalTypeName !== MetalTypeBuilderEnum::GOLDEN->value) {
            return null;
        }

        $colours = [];
        $colours[] = GoldenColourBuilderEnum::RED->value;
        $colours[] = GoldenColourBuilderEnum::WHITE->value;
        $colours[] = GoldenColourBuilderEnum::YELLOW->value;

        $numColours = $this->randCombinedColours();

        if ($numColours === 3) {
            return $this->getCombinedGolds($colours);
        } elseif ($numColours === 1) {
            return $this->getCombinedGolds([$colours[array_rand($colours)]]);
        } else {
            $newColours = array_intersect_key($colours, array_flip(array_rand($colours, 2)));
            return $this->getCombinedGolds($newColours);
        }
    }

    /**
     * @throws RandomException
     */
    private function randCombinedColours(): int
    {
        $randNumberColours = random_int(1, 100);

        if ($randNumberColours < 90) {
            return 1;
        } elseif ($randNumberColours < 98) {
            return 2;
        } else {
            return 3;
        }
    }

    private function getCombinedGolds(array $colours): array
    {
        $arrCombinedColours = [];

        $arrColours = DB::table(GoldenColourEnum::TABLE_NAME->value)->whereIn('name', $colours)->get()->toArray();

        foreach ($arrColours as $key => $arrColour) {
            $arrCombinedColours['combined'][$key]['id'] = $arrColour->id;
            $arrCombinedColours['combined'][$key]['name'] = $arrColour->name;
            $arrCombinedColours['combined'][$key]['description'] = $arrColour->description;
        }

        return $arrCombinedColours;
    }

//    private function removeItem($enumCases): array
//    {
//        foreach ($enumCases as $key => $case) {
//            if ($case->value === GoldenColourBuilderEnum::PINK->value) {
//                Arr::forget($enumCases, $key);
//            }
//        }
//
//        return $enumCases;
//    }
}
