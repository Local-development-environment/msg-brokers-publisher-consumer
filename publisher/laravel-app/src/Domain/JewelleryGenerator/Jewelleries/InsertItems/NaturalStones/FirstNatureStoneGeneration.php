<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\InsertItems\NaturalStones;

use Domain\Inserts\Colours\Enums\ColourBuilderEnum;
use Domain\Inserts\Facets\Enums\FacetBuilderEnum;
use Domain\Inserts\Stones\Enums\StoneBuilderEnum;
use Domain\Inserts\TypeOrigins\Enums\TypeOriginBuilderEnum;
use Domain\JewelleryGenerator\Traits\StoneExteriorSQL;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

final class FirstNatureStoneGeneration
{
    use StoneExteriorSQL;

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
        $randPrecious  = rand(0, 100);

        $smallCarat = config('data-seed.insert-seed.stones.carat.small');
        $middleCarat = config('data-seed.insert-seed.stones.carat.middle');

        if ($randPrecious < 30) {
            $randDiamond = rand(0, 100);

            if ($randDiamond < 70) {
                $preciousStone = DB::select($this->stoneFilterByExteriorSQL(
                    [
                        'stone' => StoneBuilderEnum::DIAMOND->value,
                        'colour' => ColourBuilderEnum::COLOURLESS->value,
                        'facet' => FacetBuilderEnum::ROUND_CUT->value,
                    ]
                ));
            } else {
                $preciousStone = DB::select($this->stoneFilterByExteriorSQL(
                    [
                        'stone' => StoneBuilderEnum::DIAMOND->value,
                        'colour' => null,
                        'facet' => null,
                    ]
                ));
            }
        } elseif ($randPrecious < 45) {
            $randSeaPearl = rand(0, 100);

            if ($randSeaPearl < 80) {
                $preciousStone = DB::select($this->stoneFilterByExteriorSQL(
                    [
                        'stone' => StoneBuilderEnum::SEA_PEARL_NATURE->value,
                        'colour' => ColourBuilderEnum::WHITE->value,
                        'facet' => FacetBuilderEnum::CABOCHON_ROUND->value,
                    ]
                ));
            } else {
                $preciousStone = DB::select($this->stoneFilterByExteriorSQL(
                    [
                        'stone' => StoneBuilderEnum::SEA_PEARL_NATURE->value,
                        'colour' => null,
                        'facet' => null,
                    ]
                ));
            }
        } else {
            $preciousStone = DB::select($this->stoneFilterByNameSQL([
                StoneBuilderEnum::DIAMOND->value,
                StoneBuilderEnum::SEA_PEARL_NATURE->value,
            ]));
        }

        $preciousStone = $preciousStone[array_rand($preciousStone)];

        $weight = rand(0, 1) ? $smallCarat[array_rand($smallCarat)] : $middleCarat[array_rand($middleCarat)];
        $quantity = rand(1, 5) < 4 ? 1 : rand(2, 5);
        $preciousStone->quantity = $quantity;
        $preciousStone->weight = $weight;

        return json_decode(json_encode($preciousStone), true);
    }

    private function getJewelleryStone(): array
    {
        $randJewellery  = rand(0, 100);

        if ($randJewellery < 60) {

        } elseif ($randJewellery < 80) {

        } elseif ($randJewellery < 95) {

        } else {

        }

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