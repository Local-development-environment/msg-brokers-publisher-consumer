<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\InsertItems\OrderInserts;

use Domain\JewelleryGenerator\Traits\ProbabilityArrayElementTrait;
use JewelleryDomain\Jewelleries\Inserts\StoneGrades\Enums\StoneGradeBuilderEnum;
use JewelleryDomain\Jewelleries\Inserts\Stones\Enums\StoneBuilderEnum;

final class ThirdInsertGeneration
{
    use ProbabilityArrayElementTrait;

    public function getThirdInsertPreciousStone(): array
    {
        $preciousStones = config('data-seed.insert-seed.stones.precious-stones');

        return $this->prepareInsert($preciousStones[array_rand($preciousStones)], 2);
    }

    public function getThirdInsertJewelleryFirstOrderStone(): array
    {
        $jewelleryStones = config('data-seed.insert-seed.stones.jewellery-stones');

        $filteredArray = array_filter($jewelleryStones, function ($item) {
            return $item['stoneGrade'] === StoneGradeBuilderEnum::FIRST_GRADE->value;
        });

        return $this->prepareInsert($filteredArray[array_rand($filteredArray)], 2);
    }

    public function getThirdInsertCubicZirconiaStone(): array
    {
        $imitationStones = config('data-seed.insert-seed.stones.imitation-stones');

        $filteredArray = array_filter($imitationStones, function ($item) {
            return $item['stoneName'] === StoneBuilderEnum::CUBIC_ZIRCONIA->value;
        });

        return $this->prepareInsert($filteredArray[array_rand($filteredArray)], 2);
    }

    public function getThirdInsertMoissaniteStone(): array
    {
        $imitationStones = config('data-seed.insert-seed.stones.imitation-stones');

        $filteredArray = array_filter($imitationStones, function ($item) {
            return $item['stoneName'] === StoneBuilderEnum::MOISSANITE->value;
        });

        return $this->prepareInsert($filteredArray[array_rand($filteredArray)], 2);
    }
}
