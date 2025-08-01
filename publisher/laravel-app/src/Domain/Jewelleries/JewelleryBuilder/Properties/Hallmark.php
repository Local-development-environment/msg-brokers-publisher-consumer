<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryBuilder\Properties;

final class Hallmark
{
    public function getHallmark($metal): int
    {
        if ($metal === 'золото') {
            $hallmark = $this->randWithProbability([375, 585, 750]);
        } elseif ($metal === 'серебро') {
            $hallmark = 925;
        } elseif ($metal === 'платина') {
            $hallmark = 950;
        } else {
            $hallmark = 950;
        }

        return $hallmark;
    }

    private function randWithProbability($entries) {

        $tmp = [];

        foreach($entries as $entry) {
            if ($entry === 585) {
                for ($x = 1; $x <= 10; $x++) {
                    $tmp[] = $entry;
                }
            }

            if ($entry === 375) {
                for ($x = 1; $x <= 2; $x++) {
                    $tmp[] = $entry;
                }
            }

            if ($entry === 750) {
                for ($x = 1; $x <= 2; $x++) {
                    $tmp[] = $entry;
                }
            }
        }

        return $tmp[array_rand($tmp)];
    }
}
