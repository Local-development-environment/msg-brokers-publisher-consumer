<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\Inserts;

use Domain\JewelleryGenerator\Traits\ProbabilityCoefficientsTrait;
use Illuminate\Support\Facades\DB;
use Random\RandomException;

final class Insert
{
    use ProbabilityCoefficientsTrait;

    /**
     * @throws RandomException
     */
    public function getInsert($category): array
    {
        $insertCount = $this->randInsertsAmount();
        $inserts = [];
//        dd(DB::table('jw_inserts.stones')->where('id', $this->randNaturalStone())->first()->name);
        if ($insertCount && $category !== 'цепи') {
            for ($i = 0; $i < $insertCount; $i++) {
                $stone = DB::table('jw_inserts.stones')->where('id', $this->randNaturalStone())->first()->name;
                $shape = $this->randShapeStone($stone);
                $inserts[] = [
                    'stone' => $stone,
                    'colour' => $this->randColourStone($stone)['colour'],
                    'facet' => $shape,
                    'optional_info' => $this->getOptionalInfo($stone),
                    'metrics' => [
                        'quantity' => $this->randQuantityProbability($stone),
                        'weight' => $this->randWeightProbability($stone),
                        'weight_unit' => 'карат',
                        'dimensions' => $this->randDimensionsProbability($shape)
                    ],
                ];
            }
        }

        return $inserts;
    }

    private function getOptionalInfo(string $stone): array|null
    {
        if ($stone === 'бриллиант') {
            return [
                'clarity' => '2',
                'purity' => '1',
                'facet' => 'A'
            ];
        }
        else {
//            return new stdClass;
            return null;
        }
    }

    /**
     * @throws RandomException
     */
    private function randQuantityProbability(string $stone): int
    {
        if ($stone === 'бриллиант' || $stone === 'фианит') {
            $quantity = random_int(10, 70);
        } else {
            $quantity = random_int(1, 10);
        }

        return $quantity;
    }

    private function randWeightProbability(string $stone): float
    {
        if ($stone === 'бриллиант' || $stone === 'фианит') {
            $weight = fake()->randomFloat(3, 0, 0.5);
        } else {
            $weight = fake()->randomFloat(3, 0.5, 1.5);
        }

        return $weight;
    }

    private function randDimensionsProbability(string $shape): array
    {
        if ($shape === 'круг') {
            $dimensions = [
                'диаметр' => fake()->randomFloat(1, 0.5, 2) . ' мм'
            ];
        } else {
            $dimensions = [
                'высота' => fake()->randomFloat(1, 3, 6) . ' мм',
                'ширина' => fake()->randomFloat(1, 2, 4) . ' мм'
            ];
        }

        return $dimensions;
    }
}
