<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\InsertItems\OrderInserts;

use Domain\Inserts\StoneGrades\Enums\StoneGradeBuilderEnum;
use Domain\Inserts\Stones\Enums\StoneBuilderEnum;
use Domain\JewelleryGenerator\Traits\ProbabilityArrayElementTrait;

final class SecondInsertGeneration
{
    use ProbabilityArrayElementTrait;

    public function getSecondInsertPreciousStone(): array
    {
        $preciousStones = config('data-seed.insert-seed.stones.precious-stones');

        return $this->prepareInsert($preciousStones[array_rand($preciousStones)], 1);
    }

    public function getSecondInsertJewelleryFirstOrderStone(): array
    {
        $jewelleryStones = config('data-seed.insert-seed.stones.jewellery-stones');

        $filteredArray = array_filter($jewelleryStones, function ($item) {
            return $item['stoneGrade'] === StoneGradeBuilderEnum::FIRST_GRADE->value;
        });

        return $this->prepareInsert($filteredArray[array_rand($filteredArray)], 1);
    }

    public function getSecondInsertCubicZirconiaStone(): array
    {
        $imitationStones = config('data-seed.insert-seed.stones.imitation-stones');

        $filteredArray = array_filter($imitationStones, function ($item) {
            return $item['stoneName'] === StoneBuilderEnum::CUBIC_ZIRCONIA->value;
        });

        return $this->prepareInsert($filteredArray[array_rand($filteredArray)], 1);
    }

    public function getSecondInsertMoissaniteStone(): array
    {
        $imitationStones = config('data-seed.insert-seed.stones.imitation-stones');

        $filteredArray = array_filter($imitationStones, function ($item) {
            return $item['stoneName'] === StoneBuilderEnum::MOISSANITE->value;
        });

        return $this->prepareInsert($filteredArray[array_rand($filteredArray)], 1);
    }
}