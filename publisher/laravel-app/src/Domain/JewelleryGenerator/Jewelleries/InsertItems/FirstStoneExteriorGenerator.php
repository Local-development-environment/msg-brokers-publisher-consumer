<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\InsertItems;

use Domain\Inserts\Stones\Enums\StoneBuilderEnum;
use Domain\Inserts\TypeOrigins\Enums\TypeOriginBuilderEnum;
use Domain\JewelleryGenerator\Traits\ProbabilityArrayElementTrait;
use Illuminate\Support\Arr;

final class FirstStoneExteriorGenerator
{
    use ProbabilityArrayElementTrait;

    public function generateStoneName(): string|array
    {
        $randOrigin = rand(0, 100);

        if ($randOrigin < 70) {
            return $this->generateNaturalStones();
        } elseif ($randOrigin < 85) {
            return $this->generateGrownStones();
        } else {
            return $this->generateImitationStones();
        }
    }

    private function generateNaturalStones(): string|array
    {
        $randGroup  = rand(0, 100);

        if ($randGroup < 50) {
            return  $this->generatePreciousStones();
        } elseif ($randGroup < 80) {
            return  $this->generateJewelleryStones();
        } elseif ($randGroup < 95) {
            return  $this->generateJwOrnamentalStones();
        } else {
            return  $this->generateOrnamentalStones();
        }
    }

    private function generatePreciousStones(): string|array
    {
        $randStone  = rand(0, 100);

        $preciousStones = config('data-seed.insert-seed.stones.precious-stones');

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
        $preciousStone['facets'] = $this->getArrElement($preciousStone['facets']);
        $preciousStone['colours'] = $this->getArrElement($preciousStone['colours']);
        $preciousStone['origins'] = TypeOriginBuilderEnum::NATURE->value;

        return $preciousStone;
    }

    private function generateJewelleryStones(): string|array
    {
        $jewelleryStones = config('data-seed.insert-seed.stones.jewellery-stones');

        $jewelleryStone = $jewelleryStones[array_rand($jewelleryStones)];

        $jewelleryStone['facets'] = $this->getArrElement($jewelleryStone['facets']);
        $jewelleryStone['colours'] = $this->getArrElement($jewelleryStone['colours']);
        $jewelleryStone['origins'] = TypeOriginBuilderEnum::NATURE->value;

        return $jewelleryStone;
    }

    private function generateJwOrnamentalStones(): string|array
    {
        $jwOrnamentalStones = config('data-seed.insert-seed.stones.jewellery-ornamental-stones');

        $jwOrnamentalStone = $jwOrnamentalStones[array_rand($jwOrnamentalStones)];
        $jwOrnamentalStone['facets'] = $this->getArrElement($jwOrnamentalStone['facets']);
        $jwOrnamentalStone['colours'] = $this->getArrElement($jwOrnamentalStone['colours']);
        $jwOrnamentalStone['origins'] = TypeOriginBuilderEnum::NATURE->value;

        return $jwOrnamentalStone;
    }

    private function generateOrnamentalStones(): string|array
    {
        $ornamentalStones = config('data-seed.insert-seed.stones.ornamental-stones');

        $ornamentalStone = $ornamentalStones[array_rand($ornamentalStones)];
        $ornamentalStone['facets'] = $this->getArrElement($ornamentalStone['facets']);
        $ornamentalStone['colours'] = $this->getArrElement($ornamentalStone['colours']);
        $ornamentalStone['origins'] = TypeOriginBuilderEnum::NATURE->value;

        return $ornamentalStone;
    }

    private function generateGrownStones(): string|array
    {
        $grownStones = config('data-seed.insert-seed.stones.grown-stones');

        $grownStone = $grownStones[array_rand($grownStones)];
        $grownStone['facets'] = $this->getArrElement($grownStone['facets']);
        $grownStone['colours'] = $this->getArrElement($grownStone['colours']);
        $grownStone['origins'] = TypeOriginBuilderEnum::GROWN->value;

        return $grownStone;

    }

    private function generateImitationStones(): string|array
    {
        $imitationStones = config('data-seed.insert-seed.stones.imitation-stones');

        $randImitation = rand(1, 100);

        if ($randImitation < 60) {
            $imitationStone = Arr::where($imitationStones, function (array $value, int $key) {
                return $value['stoneName'] === StoneBuilderEnum::CUBIC_ZIRCONIA->value;
            });

            $imitationStone = $imitationStone[array_rand($imitationStone)];

        } elseif ($randImitation < 90) {
            $imitationStone = Arr::where($imitationStones, function (array $value, int $key) {
                return $value['stoneName'] === StoneBuilderEnum::MOISSANITE->value;
            });

            $imitationStone = $imitationStone[array_rand($imitationStone)];

        } else {
            foreach ($imitationStones as $key => $stone) {
                if ($stone['stoneName'] === StoneBuilderEnum::MOISSANITE->value ||
                    $stone['stoneName'] === StoneBuilderEnum::CUBIC_ZIRCONIA->value) {
                    Arr::forget($imitationStones, $key);
                }
            }

            $imitationStone = $imitationStones[array_rand($imitationStones)];

        }
        $imitationStone['facets'] = $this->getArrElement($imitationStone['facets']);
        $imitationStone['colours'] = $this->getArrElement($imitationStone['colours']);
        $imitationStone['origins'] = TypeOriginBuilderEnum::IMITATION->value;


        return $imitationStone;
    }
}