<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\InsertItems\ImitationStones;

use Domain\Inserts\Stones\Enums\StoneBuilderEnum;
use Domain\Inserts\TypeOrigins\Enums\TypeOriginBuilderEnum;
use Illuminate\Support\Arr;

final class ForthImitationStoneGeneration
{
    public function getStone(array $stones): array
    {
        $randStone = rand(1, 100);
        $grownStones = config('data-seed.insert-seed.stones.grown-stones');
        $imitationStones = config('data-seed.insert-seed.stones.imitation-stones');

        $diamondFragments = config('data-seed.insert-seed.stones.carat.diamond-fragments');
        $extraSmall = config('data-seed.insert-seed.stones.carat.extra-small');

        if ($randStone < 50) {
            $stone = $grownStones[array_rand($grownStones)];
            $stone['typeOrigin'] = TypeOriginBuilderEnum::GROWN->value;
        } elseif ($randStone < 80) {
            $stone = Arr::where($imitationStones, function (array $value, int $key) {
                return $value['stoneName'] === StoneBuilderEnum::CUBIC_ZIRCONIA->value;
            });
            $stone = $stone[array_rand($stone)];
            $stone['typeOrigin'] = TypeOriginBuilderEnum::IMITATION->value;
        } else {
            $stone = $imitationStones[array_rand($imitationStones)];
            $stone['typeOrigin'] = TypeOriginBuilderEnum::IMITATION->value;
        }

        if (rand(0, 3) < 3) {
            $weight = $extraSmall[array_rand($extraSmall)];
            $quantity = rand(10, 20);
        } else {
            $weight = $diamondFragments[array_rand($diamondFragments)];
            $quantity = rand(30, 50);
        }
        $stone['quantity'] = $quantity;
        $stone['weight'] = $weight;

        return $stone;
    }
}