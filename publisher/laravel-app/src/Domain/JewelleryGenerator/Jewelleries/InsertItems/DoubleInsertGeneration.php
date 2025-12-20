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
        if ($firstInsert['stoneGroup'] === StoneGroupBuilderEnum::PRECIOUS->value) {

            return (new SecondInsertGeneration())->getSecondInsertPreciousStone();

        } elseif ($firstInsert['stoneGroup'] === StoneGroupBuilderEnum::JEWELLERIES->value) {

            if (rand(0,1)) {

                return (new SecondInsertGeneration())->getSecondInsertPreciousStone();

            } else {

                return (new SecondInsertGeneration())->getSecondInsertJewelleryStone();

            }

        } else {

            return $firstInsert;

        }
    }
}