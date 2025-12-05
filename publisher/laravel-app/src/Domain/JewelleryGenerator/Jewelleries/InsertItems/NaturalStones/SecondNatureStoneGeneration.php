<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\InsertItems\NaturalStones;

use Domain\Inserts\StoneGroups\Enums\StoneGroupBuilderEnum;
use Domain\Inserts\Stones\Enums\StoneBuilderEnum;
use Domain\Inserts\TypeOrigins\Enums\TypeOriginBuilderEnum;
use Illuminate\Support\Arr;

final class SecondNatureStoneGeneration
{
    public function getStone(array $stones): array
    {
        if ($stones['stoneGroup'] === StoneGroupBuilderEnum::PRECIOUS->value) {
            $preciousStones = config('data-seed.insert-seed.stones.precious-stones');
            $diamondFragments = config('data-seed.insert-seed.stones.carat.diamond-fragments');

            $preciousStones = Arr::where($preciousStones, function (array $value, int $key) {
                return $value['stoneName'] === StoneBuilderEnum::DIAMOND->value;
            });

            $preciousStone = $preciousStones[array_rand($preciousStones)];
            $weight = $diamondFragments[array_rand($diamondFragments)];
            $quantity = rand(30, 50);
            $preciousStone['quantity'] = $quantity;
            $preciousStone['weight'] = $weight;
            $preciousStone['typeOrigin'] = TypeOriginBuilderEnum::NATURE->value;

            return $preciousStone;

        }

        return $stones;
    }
}