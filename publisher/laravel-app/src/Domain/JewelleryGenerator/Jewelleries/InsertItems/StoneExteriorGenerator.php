<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\InsertItems;

use Domain\JewelleryGenerator\Traits\ProbabilityArrayElementTrait;
use Illuminate\Support\Arr;

final class StoneExteriorGenerator
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
                return $value['stoneName'] === 'бриллиант';
            });
            dump('*******************************************************************');
            $preciousStone = $preciousStone[array_rand($preciousStone)];
            $preciousStone['facet'] = $this->getArrElement($preciousStone['facets']);

            return $preciousStone;
//            return $preciousStone[$key]['facets'] = $this->getArrElement($preciousStone['facets']);
        } elseif ($randStone < 45) {
            return Arr::where($preciousStones, function (array $value, int $key) {
                return $value['stoneName'] === 'жемчуг морской натуральный';
            });
        } else {
            foreach ($preciousStones as $key => $stone) {
                if ($stone['stoneName'] === 'жемчуг морской натуральный' || $stone['stoneName'] === 'бриллиант') {
                    Arr::forget($preciousStones, $key);
                }
            }
            return $preciousStones[array_rand($preciousStones)];
        }

    }

    private function generateJewelleryStones(): string|array
    {
        $jewelleryStones = config('data-seed.insert-seed.stones.jewellery-stones');
        return $jewelleryStones[array_rand($jewelleryStones)];
    }

    private function generateJwOrnamentalStones(): string|array
    {
        $jwOrnamentalStones = config('data-seed.insert-seed.stones.jewellery-ornamental-stones');
        return $jwOrnamentalStones[array_rand($jwOrnamentalStones)];
    }

    private function generateOrnamentalStones(): string|array
    {
        $ornamentalStones = config('data-seed.insert-seed.stones.ornamental-stones');
        return $ornamentalStones[array_rand($ornamentalStones)];
    }

    private function generateGrownStones(): string|array
    {
        $grownStones = config('data-seed.insert-seed.stones.grown-stones');

        return $grownStones[array_rand($grownStones)];
    }

    private function generateImitationStones(): string|array
    {
        $imitationStones = config('data-seed.insert-seed.stones.imitation-stones');

        $randImitation = rand(1, 100);

        if ($randImitation < 60) {
            $imitationStone = Arr::where($imitationStones, function (array $value, int $key) {
                return $value['stoneName'] === 'фианит';
            });
            return $imitationStones[array_rand($imitationStones)];
        } elseif ($randImitation < 90) {
            return Arr::where($imitationStones, function (array $value, int $key) {
                return $value['stoneName'] === 'муассанит';
            });
        } else {
            foreach ($imitationStones as $key => $stone) {
                if ($stone['stoneName'] === 'муассанит' || $stone['stoneName'] === 'фианит') {
                    Arr::forget($imitationStones, $key);
                }
            }
            return $imitationStones[array_rand($imitationStones)];
        }
    }
}