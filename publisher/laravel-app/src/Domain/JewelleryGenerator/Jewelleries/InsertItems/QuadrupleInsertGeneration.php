<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\InsertItems;

use Domain\Inserts\TypeOrigins\Enums\TypeOriginBuilderEnum;
use Domain\JewelleryGenerator\Jewelleries\InsertItems\GrownStones\FirstGrownStoneGeneration;
use Domain\JewelleryGenerator\Jewelleries\InsertItems\GrownStones\ForthGrownStoneGeneration;
use Domain\JewelleryGenerator\Jewelleries\InsertItems\GrownStones\SecondGrownStoneGeneration;
use Domain\JewelleryGenerator\Jewelleries\InsertItems\GrownStones\ThirdGrownStoneGeneration;
use Domain\JewelleryGenerator\Jewelleries\InsertItems\ImitationStones\FirstImitationStoneGeneration;
use Domain\JewelleryGenerator\Jewelleries\InsertItems\ImitationStones\ForthImitationStoneGeneration;
use Domain\JewelleryGenerator\Jewelleries\InsertItems\ImitationStones\SecondImitationStoneGeneration;
use Domain\JewelleryGenerator\Jewelleries\InsertItems\ImitationStones\ThirdImitationStoneGeneration;
use Domain\JewelleryGenerator\Jewelleries\InsertItems\NaturalStones\FirstNatureStoneGeneration;
use Domain\JewelleryGenerator\Jewelleries\InsertItems\NaturalStones\ForthNatureStoneGeneration;
use Domain\JewelleryGenerator\Jewelleries\InsertItems\NaturalStones\SecondNatureStoneGeneration;
use Domain\JewelleryGenerator\Jewelleries\InsertItems\NaturalStones\ThirdNatureStoneGeneration;

final class QuadrupleInsertGeneration
{
    public function getInsert(): array
    {
        $firstStone = $this->getFirstInsert();
        $secondStone = $this->getSecondInsert($firstStone);
        $thirdStone = $this->getThirdInsert($secondStone);
        $forthStone = $this->getForthInsert($thirdStone);

        return [
            $firstStone,
            $secondStone,
            $thirdStone,
            $forthStone,
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
        if ($firstStone['typeOrigin'] === TypeOriginBuilderEnum::IMITATION->value) {
            return (new SecondImitationStoneGeneration())->getStone($firstStone);
        } elseif ($firstStone['typeOrigin'] === TypeOriginBuilderEnum::NATURE->value) {
            return (new SecondNatureStoneGeneration())->getStone($firstStone);
        } else {
            return (new SecondGrownStoneGeneration())->getStone($firstStone);
        }
    }

    private function getThirdInsert(array $secondStone): array
    {
        if ($secondStone['typeOrigin'] === TypeOriginBuilderEnum::IMITATION->value) {
            return (new ThirdImitationStoneGeneration())->getStone($secondStone);
        } elseif ($secondStone['typeOrigin'] === TypeOriginBuilderEnum::NATURE->value) {
            return (new ThirdNatureStoneGeneration())->getStone($secondStone);
        } else {
            return (new ThirdGrownStoneGeneration())->getStone($secondStone);
        }
    }

    private function getForthInsert(array $thirdStone): array
    {
        if ($thirdStone['typeOrigin'] === TypeOriginBuilderEnum::IMITATION->value) {
            return (new ForthImitationStoneGeneration())->getStone($thirdStone);
        } elseif ($thirdStone['typeOrigin'] === TypeOriginBuilderEnum::NATURE->value) {
            return (new ForthNatureStoneGeneration())->getStone($thirdStone);
        } else {
            return (new ForthGrownStoneGeneration())->getStone($thirdStone);
        }
    }
}