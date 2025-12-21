<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\InsertItems;

use Domain\JewelleryGenerator\Jewelleries\InsertItems\OrderInserts\ThirdInsertGeneration;

final class TripleInsertGeneration
{
    public function getInsert(): array
    {
        $randNum = rand(1, 100);

        if ($randNum < 25) {
            return (new ThirdInsertGeneration())->getThirdInsertPreciousStone();
        } elseif ($randNum < 50) {
            return (new ThirdInsertGeneration())->getThirdInsertJewelleryFirstOrderStone();
        } elseif ($randNum < 75) {
            return (new ThirdInsertGeneration())->getThirdInsertCubicZirconiaStone();
        } else {
            return (new ThirdInsertGeneration())->getThirdInsertMoissaniteStone();
        }
    }

}