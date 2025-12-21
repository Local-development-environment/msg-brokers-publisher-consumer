<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\InsertItems;

use Domain\Inserts\StoneGroups\Enums\StoneGroupBuilderEnum;
use Domain\JewelleryGenerator\Jewelleries\InsertItems\OrderInserts\SecondInsertGeneration;
use Domain\JewelleryGenerator\Traits\ProbabilityArrayElementTrait;

final class DoubleInsertGeneration
{
    use ProbabilityArrayElementTrait;
    public function getInsert(array $firstInsert, int $keyInsert): array
    {
        $randNum = rand(1, 100);

        if ($randNum < 25) {
            return (new SecondInsertGeneration())->getSecondInsertPreciousStone();
        } elseif ($randNum < 50) {
            return (new SecondInsertGeneration())->getSecondInsertJewelleryFirstOrderStone();
        } elseif ($randNum < 75) {
            return (new SecondInsertGeneration())->getSecondInsertCubicZirconiaStone();
        } else {
            return (new SecondInsertGeneration())->getSecondInsertMoissaniteStone();
        }
    }
}