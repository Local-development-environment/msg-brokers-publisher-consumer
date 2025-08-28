<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryBuilder\Properties;

final class Coverage
{
    public function getCoverages($properties): array
    {
//        dd($properties);
        $metal = $properties['prcsMetal'];
        $category = $properties['category'];

        $goldenCoverage = [[], ['родирование']];
        $silverCoverage = [[], ['родирование'], ['золочение'], ['оксидирование']];

        if ($metal === 'золото') {
            $coverage = $this->randGoldWithProbability($goldenCoverage);
        } elseif ($metal === 'серебро') {
            $coverage = $this->randSilverWithProbability($silverCoverage);
        } elseif ($metal === 'платина') {
            $coverage = [];
        } else {
            $coverage = [];
        }

        $anotherCoverage = $this->randCoverage($category);

        if ($anotherCoverage) {
            $coverage[] = $anotherCoverage;
        }

        return $coverage;
    }

    private function randGoldWithProbability($entries) {

        $tmp = [];

        foreach($entries as $entry) {
            if ($entry === []) {
                for ($x = 1; $x <= 7; $x++) {
                    $tmp[] = $entry;
                }
            }

            if ($entry === ['родирование']) {
                for ($x = 1; $x <= 3; $x++) {
                    $tmp[] = $entry;
                }
            }
        }

        return $tmp[array_rand($tmp)];
    }

    private function randSilverWithProbability($entries) {

        $tmp = [];

        foreach($entries as $entry) {
            if ($entry === []) {
                for ($x = 1; $x <= 5; $x++) {
                    $tmp[] = $entry;
                }
            }

            if ($entry === ['родирование']) {
                for ($x = 1; $x <= 10; $x++) {
                    $tmp[] = $entry;
                }
            }

            if ($entry === ['оксидирование']) {
                for ($x = 1; $x <= 5; $x++) {
                    $tmp[] = $entry;
                }
            }

            if ($entry === ['золочение']) {
                for ($x = 1; $x <= 5; $x++) {
                    $tmp[] = $entry;
                }
            }
        }

        return $tmp[array_rand($tmp)];
    }

    private function randCoverage($category)
    {
//        dd($category);
        if ($category !== 'бусы') {
            $tmp = [];

            for ($x = 1; $x <= 20; $x++) {
                $tmp[] = '';
            }

            for ($x = 1; $x <= 4; $x++) {
                $tmp[] = 'алмазная грань';
            }

            for ($x = 1; $x <= 2; $x++) {
                $tmp[] = 'эмаль';
            }

            return $tmp[array_rand($tmp)];
        }
        return [];
    }
}
