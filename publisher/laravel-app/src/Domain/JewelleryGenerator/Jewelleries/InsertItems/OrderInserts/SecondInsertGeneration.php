<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\InsertItems\OrderInserts;

use Domain\JewelleryGenerator\Traits\ProbabilityArrayElementTrait;

final class SecondInsertGeneration
{
    use ProbabilityArrayElementTrait;

    public function getSecondInsertPreciousStone(): array
    {
        $preciousStones = config('data-seed.insert-seed.stones.precious-stones');

        return $this->prepareInsert($preciousStones[array_rand($preciousStones)], 1);
    }

    public function getSecondInsertJewelleryStone(): array
    {
        $jewelleryStones = config('data-seed.insert-seed.stones.jewellery-stones');

        return $this->prepareInsert($jewelleryStones[array_rand($jewelleryStones)], 1);
    }
}