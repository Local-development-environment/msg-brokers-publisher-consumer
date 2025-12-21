<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\InsertItems;

use Domain\JewelleryGenerator\Jewelleries\InsertItems\OrderInserts\ForthInsertGeneration;

final class QuadrupleInsertGeneration
{
    public function getInsert(): array
    {
        $randNum = rand(1, 100);

        if ($randNum < 25) {
            return (new ForthInsertGeneration())->getForthInsertPreciousStone();
        } elseif ($randNum < 50) {
            return (new ForthInsertGeneration())->getForthInsertJewelleryFirstOrderStone();
        } elseif ($randNum < 75) {
            return (new ForthInsertGeneration())->getForthInsertCubicZirconiaStone();
        } else {
            return (new ForthInsertGeneration())->getForthInsertMoissaniteStone();
        }
    }
}