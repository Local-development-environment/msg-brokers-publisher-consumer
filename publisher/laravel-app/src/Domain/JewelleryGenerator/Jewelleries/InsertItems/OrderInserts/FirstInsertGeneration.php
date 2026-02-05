<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\InsertItems\OrderInserts;

use Domain\JewelleryGenerator\Traits\ProbabilityArrayElementTrait;
use JewelleryDomain\Jewelleries\Inserts\StoneGrades\Enums\StoneGradeBuilderEnum;

final class FirstInsertGeneration
{
    use ProbabilityArrayElementTrait;

    public function getFirstInsertSilverJewellery(): array
    {
        $jewelleryStones = config('data-seed.insert-seed.stones.jewellery-stones');
        $jewelleryOrnamentalStones = config('data-seed.insert-seed.stones.jewellery-ornamental-stones');
        $ornamentalStones = config('data-seed.insert-seed.stones.ornamental-stones');
        $preciousStones = config('data-seed.insert-seed.stones.precious-stones');
        $grownStones = config('data-seed.insert-seed.stones.grown-stones');
        $imitationStones = config('data-seed.insert-seed.stones.imitation-stones');

        $randNum = rand(1, 100);

        if ($randNum < 10) {

            return $this->prepareInsert($preciousStones[array_rand($preciousStones)], 0);

        } elseif ($randNum < 40) {

            $filteredArray = array_filter($jewelleryStones, function ($value) {
                return $value['stoneGrade'] === StoneGradeBuilderEnum::FIRST_GRADE->value;
            });

            return $this->prepareInsert($filteredArray[array_rand($filteredArray)], 0);

        } elseif ($randNum < 60) {

            $filteredArray = array_filter($jewelleryStones, function ($value) {
                return $value['stoneGrade'] === StoneGradeBuilderEnum::SECOND_GRADE->value;
            });

            return $this->prepareInsert($filteredArray[array_rand($filteredArray)], 0);

        } elseif ($randNum < 70) {

            $filteredArray = array_filter($jewelleryStones, function ($value) {
                return $value['stoneGrade'] === StoneGradeBuilderEnum::THIRD_GRADE->value;
            });

            return $this->prepareInsert($filteredArray[array_rand($filteredArray)], 0);

        } elseif ($randNum < 75) {

            $filteredArray = array_filter($jewelleryStones, function ($value) {
                return $value['stoneGrade'] === StoneGradeBuilderEnum::FORTH_GRADE->value;
            });

            return $this->prepareInsert($filteredArray[array_rand($filteredArray)], 0);

        } elseif ($randNum < 80) {

            $filteredArray = array_filter($jewelleryOrnamentalStones, function ($value) {
                return $value['stoneGrade'] === StoneGradeBuilderEnum::FIRST_GRADE->value;
            });

            return $this->prepareInsert($filteredArray[array_rand($filteredArray)], 0);

        } elseif ($randNum < 85) {

            $filteredArray = array_filter($jewelleryOrnamentalStones, function ($value) {
                return $value['stoneGrade'] === StoneGradeBuilderEnum::SECOND_GRADE->value;
            });

            return $this->prepareInsert($filteredArray[array_rand($filteredArray)], 0);

        } elseif ($randNum < 90) {

            return $this->prepareInsert($ornamentalStones[array_rand($ornamentalStones)], 0);

        } elseif ($randNum < 95) {

            return $this->prepareInsert($grownStones[array_rand($grownStones)], 0);

        } else {

            return $this->prepareInsert($imitationStones[array_rand($imitationStones)], 0);

        }
    }

    public function getFirstInsertGoldenJewellery(): array
    {
        $jewelleryStones = config('data-seed.insert-seed.stones.jewellery-stones');
        $jewelleryOrnamentalStones = config('data-seed.insert-seed.stones.jewellery-ornamental-stones');
        $preciousStones = config('data-seed.insert-seed.stones.precious-stones');
        $grownStones = config('data-seed.insert-seed.stones.grown-stones');
        $imitationStones = config('data-seed.insert-seed.stones.imitation-stones');

        $randNum = rand(1, 100);

        if ($randNum < 30) {

            return $this->prepareInsert($preciousStones[array_rand($preciousStones)], 0);

        } elseif ($randNum < 60) {

            $filteredArray = array_filter($jewelleryStones, function ($value) {
                return $value['stoneGrade'] === StoneGradeBuilderEnum::FIRST_GRADE->value;
            });

            return $this->prepareInsert($filteredArray[array_rand($filteredArray)], 0);

        } elseif ($randNum < 75) {

            $filteredArray = array_filter($jewelleryStones, function ($value) {
                return $value['stoneGrade'] === StoneGradeBuilderEnum::SECOND_GRADE->value;
            });

            return $this->prepareInsert($filteredArray[array_rand($filteredArray)], 0);

        } elseif ($randNum < 80) {

            $filteredArray = array_filter($jewelleryStones, function ($value) {
                return $value['stoneGrade'] === StoneGradeBuilderEnum::THIRD_GRADE->value;
            });

            return $this->prepareInsert($filteredArray[array_rand($filteredArray)], 0);

        } elseif ($randNum < 85) {

            $filteredArray = array_filter($jewelleryOrnamentalStones, function ($value) {
                return $value['stoneGrade'] === StoneGradeBuilderEnum::FIRST_GRADE->value;
            });

            return $this->prepareInsert($filteredArray[array_rand($filteredArray)], 0);

        } elseif ($randNum < 90) {

            return $this->prepareInsert($grownStones[array_rand($grownStones)], 0);

        } else {

            return $this->prepareInsert($imitationStones[array_rand($imitationStones)], 0);

        }
    }

    public function getFirstInsertPlatinumJewellery(): array
    {
        $preciousStones = config('data-seed.insert-seed.stones.precious-stones');
        $jewelleryStones = config('data-seed.insert-seed.stones.jewellery-stones');

        $randNum = rand(1, 100);

        if ($randNum < 40) {

            return $this->prepareInsert($preciousStones[array_rand($preciousStones)], 0);

        } elseif ($randNum < 70) {

            $filteredArray = array_filter($jewelleryStones, function ($value) {
                return $value['stoneGrade'] === StoneGradeBuilderEnum::FIRST_GRADE->value;
            });

            return $this->prepareInsert($filteredArray[array_rand($filteredArray)], 0);

        } else {

            $filteredArray = array_filter($jewelleryStones, function ($value) {
                return $value['stoneGrade'] === StoneGradeBuilderEnum::SECOND_GRADE->value;
            });

            return $this->prepareInsert($filteredArray[array_rand($filteredArray)], 0);

        }
    }
}
