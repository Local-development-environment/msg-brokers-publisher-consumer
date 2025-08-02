<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryBuilder\Properties;

use Random\RandomException;

final class Insert
{
    /**
     * @throws RandomException
     */
    public function getInsert($category): array
    {
        $insertCount = $this->randCountWithProbability();

        $inserts = [];

        if ($insertCount && $category !== 'цепи') {
            for ($i = 0; $i < $insertCount; $i++) {
                $stone = $this->randStoneWithProbability();
                $shape = $this->randShapeProbability($stone);
                $inserts[] = [
                    'stone' => $stone,
                    'insert_colour' => $this->randColourProbability($stone),
                    'insert_shape' => $shape,
                    'insert_property' => [
                        'quantity' => $this->randQuantityProbability($stone),
                        'weight' => $this->randWeightProbability($stone),
                        'weight_unit' => 'карат',
                        'dimensions' => $this->randDimensionsProbability($shape)
                    ]
                ];
            }
        } else {
            $inserts = [];
        }

        return $inserts;
    }

    private function randCountWithProbability(): int
    {
        $tmp = [];

        for ($x = 1; $x <= 10; $x++) {
            $tmp[] = 1;
        }

        for ($x = 1; $x <= 5; $x++) {
            $tmp[] = 0;
        }

        for ($x = 1; $x <= 7; $x++) {
            $tmp[] = 2;
        }

        for ($x = 1; $x <= 3; $x++) {
            $tmp[] = 3;
        }

        for ($x = 1; $x <= 1; $x++) {
            $tmp[] = 4;
        }

        return $tmp[array_rand($tmp)];
    }

    private function randColourProbability($stone): string
    {
        $tmp = [];

        if ($stone === 'бриллиант' || $stone === 'фианит') {
            $tmp[] = 'бесцветный';
        }
        elseif ($stone === 'гранат') {
            $tmp[] = 'красный';
        }
        elseif ($stone === 'топаз') {
            $tmp[] = 'голубой';
        }
        elseif ($stone === 'сапфир') {
            $tmp[] = 'синий';
        }
        elseif ($stone === 'жемчуг') {
            $tmp[] = 'белый';
        }

        return $tmp[array_rand($tmp)];
    }

    private function randStoneWithProbability(): string{
        $tmp = [];

        for ($x = 1; $x <= 10; $x++) {
            $tmp[] = 'бриллиант';
        }

        for ($x = 1; $x <= 8; $x++) {
            $tmp[] = 'фианит';
        }

        for ($x = 1; $x <= 3; $x++) {
            $tmp[] = 'топаз';
        }

        for ($x = 1; $x <= 3; $x++) {
            $tmp[] = 'сапфир';
        }

        for ($x = 1; $x <= 3; $x++) {
            $tmp[] = 'гранат';
        }

        for ($x = 1; $x <= 2; $x++) {
            $tmp[] = 'жемчуг';
        }

        return $tmp[array_rand($tmp)];
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
