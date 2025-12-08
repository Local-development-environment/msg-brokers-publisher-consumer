<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\InsertItems\NaturalStones;

use Domain\Inserts\StoneGrades\Enums\StoneGradeBuilderEnum;
use Domain\Inserts\StoneGroups\Enums\StoneGroupBuilderEnum;
use Domain\Inserts\Stones\Enums\StoneBuilderEnum;
use Domain\Inserts\TypeOrigins\Enums\TypeOriginBuilderEnum;
use Illuminate\Support\Arr;

final class SecondNatureStoneGeneration
{
    public function getStone(array $stones): array
    {
        $preciousStones = config('data-seed.insert-seed.stones.precious-stones');
        $jewelleryStones = config('data-seed.insert-seed.stones.jewellery-stones');
        $jewelleryOrnamentalStones = config('data-seed.insert-seed.stones.jewellery-ornamental-stones');
        $ornamentalStones = config('data-seed.insert-seed.stones.ornamental-stones');
        $imitationStones = config('data-seed.insert-seed.stones.imitation-stones');

        $diamondFragments = config('data-seed.insert-seed.stones.carat.diamond-fragments');
        $extraSmall = config('data-seed.insert-seed.stones.carat.extra-small');

        if ($stones['stoneGroup'] === StoneGroupBuilderEnum::PRECIOUS->value) {

            $randStone = rand(1, 100);

            if ($randStone < 30) {
                $stones = Arr::where($imitationStones, function (array $value, int $key) {
                    return $value['stoneName'] === StoneBuilderEnum::CUBIC_ZIRCONIA->value;
                });
                $stone['typeOrigin'] = TypeOriginBuilderEnum::IMITATION->value;
            } elseif ($randStone < 50) {
                $stones = Arr::where($imitationStones, function (array $value, int $key) {
                    return $value['stoneName'] === StoneBuilderEnum::MOISSANITE->value;
                });
                $stone['typeOrigin'] = TypeOriginBuilderEnum::IMITATION->value;
            } else {
                $stones = Arr::where($preciousStones, function (array $value, int $key) {
                    return $value['stoneName'] === StoneBuilderEnum::DIAMOND->value;
                });
                $stone['typeOrigin'] = TypeOriginBuilderEnum::NATURE->value;
            }

            $stone = $stones[array_rand($stones)];
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

        } elseif ($stones['stoneGroup'] === StoneGroupBuilderEnum::JEWELLERIES->value) {
            $randStone = rand(1, 100);

            if ($randStone < 50) {
                $stone = $jewelleryStones[array_rand($jewelleryStones)];
                $stone['typeOrigin'] = TypeOriginBuilderEnum::NATURE->value;
            } elseif ($randStone < 80) {
                $stone = Arr::where($imitationStones, function (array $value, int $key) {
                    return $value['stoneName'] === StoneBuilderEnum::CUBIC_ZIRCONIA->value;
                });
                $stone = $stone[array_rand($stone)];
                $stone['typeOrigin'] = TypeOriginBuilderEnum::IMITATION->value;
            } else {
                $stone = Arr::where($imitationStones, function (array $value, int $key) {
                    return $value['stoneName'] === StoneBuilderEnum::MOISSANITE->value;
                });
                $stone = $stone[array_rand($stone)];
                $stone['typeOrigin'] = TypeOriginBuilderEnum::IMITATION->value;
            }

//            $stone = $stones[array_rand($stones)];
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

        } elseif ($stones['stoneGroup'] === StoneGroupBuilderEnum::JEWELLERY_ORNAMENTAL->value) {
            $randStone = rand(1, 100);

            if ($randStone < 50) {
                $stone = $jewelleryOrnamentalStones[array_rand($jewelleryOrnamentalStones)];
                $stone['typeOrigin'] = TypeOriginBuilderEnum::NATURE->value;
            } elseif ($randStone < 80) {
                $stone = Arr::where($imitationStones, function (array $value, int $key) {
                    return $value['stoneName'] === StoneBuilderEnum::CUBIC_ZIRCONIA->value;
                });
                $stone = $stone[array_rand($stone)];
                $stone['typeOrigin'] = TypeOriginBuilderEnum::IMITATION->value;
            } else {
                $stone = Arr::where($imitationStones, function (array $value, int $key) {
                    return $value['stoneName'] === StoneBuilderEnum::MOISSANITE->value;
                });
                $stone = $stone[array_rand($stone)];
                $stone['typeOrigin'] = TypeOriginBuilderEnum::IMITATION->value;
            }

//            $stone = $stones[array_rand($stones)];
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
        } else {
            $randStone = rand(1, 100);

            if ($randStone < 50) {
                $stone = $ornamentalStones[array_rand($ornamentalStones)];
                $stone['typeOrigin'] = TypeOriginBuilderEnum::NATURE->value;
            } elseif ($randStone < 80) {
                $stone = Arr::where($imitationStones, function (array $value, int $key) {
                    return $value['stoneName'] === StoneBuilderEnum::CUBIC_ZIRCONIA->value;
                });
                $stone = $stone[array_rand($stone)];
                $stone['typeOrigin'] = TypeOriginBuilderEnum::IMITATION->value;
            } else {
                $stone = Arr::where($imitationStones, function (array $value, int $key) {
                    return $value['stoneName'] === StoneBuilderEnum::MOISSANITE->value;
                });
                $stone = $stone[array_rand($stone)];
                $stone['typeOrigin'] = TypeOriginBuilderEnum::IMITATION->value;
            }

//            $stone = $stones[array_rand($stones)];
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
}