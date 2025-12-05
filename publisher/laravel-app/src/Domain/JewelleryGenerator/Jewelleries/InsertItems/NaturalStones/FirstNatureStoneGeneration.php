<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\InsertItems\NaturalStones;

use Domain\Inserts\Stones\Enums\StoneBuilderEnum;
use Domain\Inserts\TypeOrigins\Enums\TypeOriginBuilderEnum;
use Illuminate\Support\Arr;

final class FirstNatureStoneGeneration
{
    public function getStone(): array
    {
        $randGroup = rand(0, 100);

        if ($randGroup < 50) {
            $stone = $this->getPreciousStone();
        } elseif ($randGroup < 80) {
            $stone = $this->getJewelleryStone();
        } elseif ($randGroup < 95) {
            $stone = $this->getJewelleryOrnamentalStone();
        } else {
            $stone = $this->getOrnamentalStone();
        }
        return $stone;
    }

    private function getPreciousStone(): array
    {
        $randStone  = rand(0, 100);

        $preciousStones = config('data-seed.insert-seed.stones.precious-stones');
        $smallCarat = config('data-seed.insert-seed.stones.carat.small');
        $middleCarat = config('data-seed.insert-seed.stones.carat.middle');

        if ($randStone < 30) {
            $preciousStone = Arr::where($preciousStones, function (array $value, int $key) {
                return $value['stoneName'] === StoneBuilderEnum::DIAMOND->value;
            });

            $preciousStone = $preciousStone[array_rand($preciousStone)];

        } elseif ($randStone < 45) {
            $preciousStone = Arr::where($preciousStones, function (array $value, int $key) {
                return $value['stoneName'] === StoneBuilderEnum::SEE_PEARL_NATURE->value;
            });

            $preciousStone = $preciousStone[array_rand($preciousStone)];

        } else {
            foreach ($preciousStones as $key => $stone) {
                if ($stone['stoneName'] === StoneBuilderEnum::SEE_PEARL_NATURE->value ||
                    $stone['stoneName'] === StoneBuilderEnum::DIAMOND->value) {
                    Arr::forget($preciousStones, $key);
                }
            }

            $preciousStone = $preciousStones[array_rand($preciousStones)];
        }

        $weight = rand(0, 1) ? $smallCarat[array_rand($smallCarat)] : $middleCarat[array_rand($middleCarat)];
        $quantity = rand(1, 5) < 4 ? 1 : rand(2, 5);
        $preciousStone['quantity'] = $quantity;
        $preciousStone['weight'] = $weight;
        $preciousStone['typeOrigin'] = TypeOriginBuilderEnum::NATURE->value;

        return $preciousStone;
    }

    private function getJewelleryStone(): array
    {
        $jewelleryStones = config('data-seed.insert-seed.stones.jewellery-stones');
        $middleCarat = config('data-seed.insert-seed.stones.carat.middle');
        $largeCarat = config('data-seed.insert-seed.stones.carat.large');

        $jewelleryStone = $jewelleryStones[array_rand($jewelleryStones)];

        $weight = rand(0, 1) ? $middleCarat[array_rand($middleCarat)] : $largeCarat[array_rand($largeCarat)];
        $quantity = rand(1, 5) < 4 ? 1 : rand(2, 5);
        $jewelleryStone['quantity'] = $quantity;
        $jewelleryStone['weight'] = $weight;
        $jewelleryStone['typeOrigin'] = TypeOriginBuilderEnum::NATURE->value;

        return $jewelleryStone;
    }

    private function getJewelleryOrnamentalStone(): array
    {
        $jewelleryOrnamentalStones = config('data-seed.insert-seed.stones.jewellery-ornamental-stones');
        $middleCarat = config('data-seed.insert-seed.stones.carat.middle');
        $largeCarat = config('data-seed.insert-seed.stones.carat.large');

        $jewelleryOrnamentalStone = $jewelleryOrnamentalStones[array_rand($jewelleryOrnamentalStones)];

        $weight = rand(0, 1) ? $middleCarat[array_rand($middleCarat)] : $largeCarat[array_rand($largeCarat)];
        $quantity = rand(1, 5) < 4 ? 1 : rand(2, 5);
        $jewelleryOrnamentalStone['quantity'] = $quantity;
        $jewelleryOrnamentalStone['weight'] = $weight;
        $jewelleryOrnamentalStone['typeOrigin'] = TypeOriginBuilderEnum::NATURE->value;

        return $jewelleryOrnamentalStone;
    }

    private function getOrnamentalStone(): array
    {
        $ornamentalStones = config('data-seed.insert-seed.stones.ornamental-stones');
        $middleCarat = config('data-seed.insert-seed.stones.carat.middle');
        $largeCarat = config('data-seed.insert-seed.stones.carat.large');

        $ornamentalStone = $ornamentalStones[array_rand($ornamentalStones)];

        $weight = rand(0, 1) ? $middleCarat[array_rand($middleCarat)] : $largeCarat[array_rand($largeCarat)];
        $quantity = rand(1, 5) < 4 ? 1 : rand(2, 5);
        $ornamentalStone['quantity'] = $quantity;
        $ornamentalStone['weight'] = $weight;
        $ornamentalStone['typeOrigin'] = TypeOriginBuilderEnum::NATURE->value;

        return $ornamentalStone;
    }
}