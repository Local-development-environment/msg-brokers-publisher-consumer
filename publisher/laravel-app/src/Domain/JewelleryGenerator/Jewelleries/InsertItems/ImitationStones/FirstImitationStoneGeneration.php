<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\InsertItems\ImitationStones;

use Domain\Inserts\TypeOrigins\Enums\TypeOriginBuilderEnum;

final class FirstImitationStoneGeneration
{
    public function getStone(): array
    {
        $imitationStones = config('data-seed.insert-seed.stones.imitation-stones');
        $middleCarat = config('data-seed.insert-seed.stones.carat.middle');
        $largeCarat = config('data-seed.insert-seed.stones.carat.large');

        $imitationStone = $imitationStones[array_rand($imitationStones)];

        $weight = rand(0, 1) ? $middleCarat[array_rand($middleCarat)] : $largeCarat[array_rand($largeCarat)];
        $quantity = rand(1, 5) < 4 ? 1 : rand(2, 5);
        $imitationStone['quantity'] = $quantity;
        $imitationStone['weight'] = $weight;
        $imitationStone['typeOrigin'] = TypeOriginBuilderEnum::IMITATION->value;

        return $imitationStone;
    }
}