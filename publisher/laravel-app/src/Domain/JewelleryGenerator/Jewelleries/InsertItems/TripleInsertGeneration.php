<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\InsertItems;

use Domain\Inserts\StoneGroups\Enums\StoneGroupBuilderEnum;
use Domain\JewelleryGenerator\Jewelleries\InsertItems\OrderInserts\ThirdInsertGeneration;

final class TripleInsertGeneration
{
    public function getInsert(array $secondInsert): array
    {
        if ($secondInsert['stoneGroup'] === StoneGroupBuilderEnum::JEWELLERIES->value) {

            return (new ThirdInsertGeneration())->getSecondInsertPreciousStone();

        } elseif ($secondInsert['stoneGroup'] === StoneGroupBuilderEnum::JEWELLERY_ORNAMENTAL->value) {

            if (rand(0,1)) {

                return (new ThirdInsertGeneration())->getSecondInsertPreciousStone();

            } else {

                return (new ThirdInsertGeneration())->getSecondInsertJewelleryStone();

            }

        } else {

            return $secondInsert;

        }
    }

}