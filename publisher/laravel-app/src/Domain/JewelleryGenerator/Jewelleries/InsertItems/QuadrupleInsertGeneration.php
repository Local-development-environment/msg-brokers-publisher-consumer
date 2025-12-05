<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\InsertItems;

use Domain\JewelleryGenerator\Jewelleries\InsertItems\GrownStones\FirstGrownStoneGeneration;
use Domain\JewelleryGenerator\Jewelleries\InsertItems\ImitationStones\FirstImitationStoneGeneration;
use Domain\JewelleryGenerator\Jewelleries\InsertItems\NaturalStones\FirstNatureStoneGeneration;

final class QuadrupleInsertGeneration
{
    public function getInsert(): array
    {
        $randOrigin = rand(0, 100);

        if ($randOrigin < 70) {
            return (new FirstNatureStoneGeneration())->getStone();
        } elseif ($randOrigin < 85) {
            return (new FirstGrownStoneGeneration())->getStone();
        } else {
            return (new FirstImitationStoneGeneration())->getStone();
        }
    }
}