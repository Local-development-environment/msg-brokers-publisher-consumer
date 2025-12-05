<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\InsertItems;

use Domain\Inserts\TypeOrigins\Enums\TypeOriginBuilderEnum;
use Domain\JewelleryGenerator\Jewelleries\InsertItems\GrownStones\FirstGrownStoneGeneration;
use Domain\JewelleryGenerator\Jewelleries\InsertItems\ImitationStones\FirstImitationStoneGeneration;
use Domain\JewelleryGenerator\Jewelleries\InsertItems\NaturalStones\FirstNatureStoneGeneration;
use Domain\JewelleryGenerator\Jewelleries\InsertItems\NaturalStones\SecondNatureStoneGeneration;

final class DoubleInsertGeneration
{
    public function getInsert(): array
    {
        $firstStone = $this->getFirstInsert();
        $secondStone = $this->getSecondInsert($firstStone);

        return [
            $firstStone,
            $secondStone,
        ];
    }

    private function getFirstInsert(): array
    {
        $randOrigin = rand(0, 100);

        if ($randOrigin < 70) {
            $firstStone = (new FirstNatureStoneGeneration())->getStone();
        } elseif ($randOrigin < 85) {
            $firstStone = (new FirstGrownStoneGeneration())->getStone();
        } else {
            $firstStone = (new FirstImitationStoneGeneration())->getStone();
        }
        return $firstStone;
    }

    private function getSecondInsert(array $firstStone): array
    {
//        dd($firstStone);
        if ($firstStone['typeOrigin'] === TypeOriginBuilderEnum::IMITATION->value) {
//            return (new SecondNatureStoneGeneration())->getStone($firstStone);
            return $firstStone;
        } elseif ($firstStone['typeOrigin'] === TypeOriginBuilderEnum::NATURE->value) {
            return (new SecondNatureStoneGeneration())->getStone($firstStone);
        }
        return $firstStone;
    }
}