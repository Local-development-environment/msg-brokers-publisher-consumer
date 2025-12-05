<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\InsertItems\GrownStones;

use Domain\Inserts\TypeOrigins\Enums\TypeOriginBuilderEnum;
use Domain\JewelleryGenerator\Traits\ProbabilityArrayElementTrait;

final class FirstGrownStoneGeneration
{
    public function getStone(): array
    {
        $grownStones = config('data-seed.insert-seed.stones.grown-stones');
        $middleCarat = config('data-seed.insert-seed.stones.carat.middle');
        $largeCarat = config('data-seed.insert-seed.stones.carat.large');

        $grownStone = $grownStones[array_rand($grownStones)];

        $weight = rand(0, 1) ? $middleCarat[array_rand($middleCarat)] : $largeCarat[array_rand($largeCarat)];
        $quantity = rand(1, 5) < 4 ? 1 : rand(2, 5);
        $grownStone['quantity'] = $quantity;
        $grownStone['weight'] = $weight;
        $grownStone['typeOrigin'] = TypeOriginBuilderEnum::GROWN->value;

        return $grownStone;
    }
}