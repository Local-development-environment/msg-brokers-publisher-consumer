<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryBuilder;

trait ProbabilityCoefficientsTrait
{
    public function randInsertsAmount(): int
    {
        $tmp = [];

        for ($x = 1; $x <= 40; $x++) {
            $tmp[] = 1;
        }

        for ($x = 1; $x <= 25; $x++) {
            $tmp[] = 0;
        }

        for ($x = 1; $x <= 20; $x++) {
            $tmp[] = 2;
        }

        for ($x = 1; $x <= 10; $x++) {
            $tmp[] = 3;
        }

        for ($x = 1; $x <= 5; $x++) {
            $tmp[] = 4;
        }

        return $tmp[array_rand($tmp)];
    }

    public function randNaturalStone(): int
    {

    }
}
