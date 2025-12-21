<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\InsertItems\OrderInserts;

use Domain\Inserts\StoneGrades\Enums\StoneGradeBuilderEnum;
use Domain\Inserts\Stones\Enums\StoneBuilderEnum;
use Domain\JewelleryGenerator\Traits\ProbabilityArrayElementTrait;

final class ForthInsertGeneration
{
    use ProbabilityArrayElementTrait;

    public function getForthInsertPreciousStone(): array
    {
        $preciousStones = config('data-seed.insert-seed.stones.precious-stones');

        return $this->prepareInsert($preciousStones[array_rand($preciousStones)], 3);
    }

    public function getForthInsertJewelleryFirstOrderStone(): array
    {
        $jewelleryStones = config('data-seed.insert-seed.stones.jewellery-stones');

        $filteredArray = array_filter($jewelleryStones, function ($item) {
            return $item['stoneGrade'] === StoneGradeBuilderEnum::FIRST_GRADE->value;
        });

        return $this->prepareInsert($filteredArray[array_rand($filteredArray)], 3);
    }

    public function getForthInsertCubicZirconiaStone(): array
    {
        $imitationStones = config('data-seed.insert-seed.stones.imitation-stones');

        $filteredArray = array_filter($imitationStones, function ($item) {
            return $item['stoneName'] === StoneBuilderEnum::CUBIC_ZIRCONIA->value;
        });

        return $this->prepareInsert($filteredArray[array_rand($filteredArray)], 3);
    }

    public function getForthInsertMoissaniteStone(): array
    {
        $imitationStones = config('data-seed.insert-seed.stones.imitation-stones');

        $filteredArray = array_filter($imitationStones, function ($item) {
            return $item['stoneName'] === StoneBuilderEnum::MOISSANITE->value;
        });

        return $this->prepareInsert($filteredArray[array_rand($filteredArray)], 3);
    }

}