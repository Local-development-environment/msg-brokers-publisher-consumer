<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryBuilder\Properties;

use Domain\Jewelleries\JewelleryBuilder\ProbabilityCoefficientsTrait;
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

        if ($insertCount && $category !== 'цепи') {
            for ($i = 0; $i < $insertCount; $i++) {
                $stone = DB::table('jw_inserts.stones')->where('id', $this->randNaturalStone())->first()->name;
                $shape = $this->randShapeProbability($stone);
                $inserts[] = [
                    'stone' => $stone,
                    'insert_colour' => $this->randColourStone($stone)['colour'],
                    'insert_shape' => $shape,
                    'insert_property' => [
                        'quantity' => $this->randQuantityProbability($stone),
                        'weight' => $this->randWeightProbability($stone),
                        'weight_unit' => 'карат',
                        'dimensions' => $this->randDimensionsProbability($shape)
                    ]
                ];
            }
        }

        return $inserts;
    }

    private function randShapeProbability($stone): string
    {
        $shapes = ['круг','овал','маркиз','груша','сердце'];
        $tmp = [];

        if ($stone === 'бриллиант' || $stone === 'фианит') {
            $tmp[] = 'круг';
        } else {
            foreach($shapes as $shape) {
                if ($shape === 'круг') {
                    for ($x = 1; $x <= 5; $x++) {
                        $tmp[] = $shape;
                    }
                }
//                dump($shape);
                if ($shape === 'овал') {
                    for ($x = 1; $x <= 5; $x++) {
                        $tmp[] = $shape;
                    }
                }

                if ($shape === 'сердце') {
                    for ($x = 1; $x <= 5; $x++) {
                        $tmp[] = $shape;
                    }
                }

                if ($shape === 'маркиз') {
                    for ($x = 1; $x <= 5; $x++) {
                        $tmp[] = $shape;
                    }
                }

                if ($shape === 'груша') {
                    for ($x = 1; $x <= 5; $x++) {
                        $tmp[] = $shape;
                    }
                }
            }
        }

//        dd($tmp);
        return $tmp[array_rand($tmp)];
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
