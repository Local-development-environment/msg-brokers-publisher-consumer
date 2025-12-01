<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\InsertItems;

use Domain\Inserts\Facets\Enums\FacetBuilderEnum;
use Domain\Jewelleries\Categories\Enums\CategoryBuilderEnum;
use Illuminate\Support\Arr;

final class InsertItem
{
    public function insertItem(string $category): array
    {
        $stoneExterior = (new StoneExteriorGenerator())->generateStoneName();
        dd($stoneExterior);
        $randNum = rand(1, 100);

        if ($category === CategoryBuilderEnum::CHAINS->value || $randNum < 10) {
            return [];
        } elseif ($randNum < 55) {
            $firstStone = $stoneExterior;

            return [
                [
                    'stoneName' => $firstStone['stoneName'],
                    'facets'    => $firstStone['facets'],
                    'colours'   => $firstStone['colours'],
                    'quantity'  => $firstStone['quantity'],
                    'weight'    => $firstStone['weight'],
                ]
            ];
        } elseif ($randNum < 85) {

            $firstStone = $this->getOneInsert();
            $secondStone = $this->getManyInsert();

            return [
                [
                    'stoneName' => $firstStone['stoneName'],
                    'facets'    => $firstStone['facets'],
                    'colours'   => $firstStone['colours'],
                    'quantity'  => $firstStone['quantity'],
                    'weight'    => $firstStone['weight'],
                ],
                [
                    'stoneName' => $secondStone['stoneName'],
                    'facets'    => $secondStone['facets'],
                    'colours'   => $secondStone['colours'],
                    'quantity'  => $secondStone['quantity'],
                    'weight'    => $secondStone['weight'],
                ],
            ];
        } elseif ($randNum < 95) {

            $firstStone = $this->getOneInsert();
            $secondStone = $this->getManyInsert();
            $thirdStone = $this->getManyInsert();

            return [
                [
                    'stoneName' => $firstStone['stoneName'],
                    'facets' => $firstStone['facets'],
                    'colours' => $firstStone['colours'],
                    'quantity' => $firstStone['quantity'],
                    'weight'    => $firstStone['weight'],
                ],
                [
                    'stoneName' => $secondStone['stoneName'],
                    'facets' => $secondStone['facets'],
                    'colours' => $secondStone['colours'],
                    'quantity' => $secondStone['quantity'],
                    'weight'    => $secondStone['weight'],
                ],
                [
                    'stoneName' => $thirdStone['stoneName'],
                    'facets' => $thirdStone['facets'],
                    'colours' => $thirdStone['colours'],
                    'quantity' => $thirdStone['quantity'],
                    'weight'    => $thirdStone['weight'],
                ],
            ];
        } else {

            $firstStone = $this->getOneInsert();
            $secondStone = $this->getManyInsert();
            $thirdStone = $this->getManyInsert();
            $forthStone = $this->getManyInsert();

            return [
                [
                    'stoneName' => $firstStone['stoneName'],
                    'facets' => $firstStone['facets'],
                    'colours' => $firstStone['colours'],
                    'quantity' => $firstStone['quantity'],
                    'weight'    => $firstStone['weight'],
                ],
                [
                    'stoneName' => $secondStone['stoneName'],
                    'facets' => $secondStone['facets'],
                    'colours' => $secondStone['colours'],
                    'quantity' => $secondStone['quantity'],
                    'weight'    => $secondStone['weight'],
                ],
                [
                    'stoneName' => $thirdStone['stoneName'],
                    'facets' => $thirdStone['facets'],
                    'colours' => $thirdStone['colours'],
                    'quantity' => $thirdStone['quantity'],
                    'weight'    => $thirdStone['weight'],
                ],
                [
                    'stoneName' => $forthStone['stoneName'],
                    'facets' => $forthStone['facets'],
                    'colours' => $forthStone['colours'],
                    'quantity' => $forthStone['quantity'],
                    'weight'    => $forthStone['weight'],
                ]
            ];
        }
    }

    private function getOneInsert(): array
    {
        $randStone = rand(1, 100);

        if ($randStone < 45) {

            $stones = config('data-seed.insert-seed.stones.precious-stones');

        } elseif ($randStone < 55) {

            $stones = config('data-seed.insert-seed.stones.jewellery-stones');

        } elseif ($randStone < 85) {

            $stones = config('data-seed.insert-seed.stones.jewellery-ornamental-stones');

        } else {

            $stones = config('data-seed.insert-seed.stones.ornamental-stones');

        }

        $key = array_rand($stones);

        $quantity = $this->getQuantity(1);

        return [
            'stoneName' => $stones[$key]['stoneName'],
            'stoneFamily' => $stones[$key]['stoneFamily'],
            'stoneGroup' => $stones[$key]['stoneGroup'],
            'stoneGrade' => $stones[$key]['stoneGrade'],
            'facets'     => $this->getFacet($stones[$key]['facets']),
            'colours'    => $this->getColour($stones[$key]['colours']),
            'quantity'   => $quantity,
            'weight'     => $this->getWeight(1, $quantity),
        ];
    }

    private function getManyInsert(): array
    {
        $randStone = rand(1, 100);

        if ($randStone < 50) {

            $stones = config('data-seed.insert-seed.stones.precious-stones');

        } else {

            $stones = config('data-seed.insert-seed.stones.jewellery-stones');

        }

        $key = array_rand($stones);

        $smallFacets = [
            [
                FacetBuilderEnum::CABOCHON_ROUND->value,
                20
            ],
            [
                FacetBuilderEnum::ROUND_CUT->value,
                40
            ],
            [
                FacetBuilderEnum::BAGUETTE_CUT->value,
                40
            ]
        ];

        $quantity = $this->getQuantity(2);

        return [
            'stoneName'   => $stones[$key]['stoneName'],
            'stoneFamily' => $stones[$key]['stoneFamily'],
            'stoneGroup'  => $stones[$key]['stoneGroup'],
            'stoneGrade'  => $stones[$key]['stoneGrade'],
            'facets'      => $this->getFacet($smallFacets),
            'colours'     => $this->getColour($stones[$key]['colours']),
            'quantity'    => $quantity,
            'weight'      => $this->getWeight(2, $quantity),
        ];
    }

    private function getWeight(int $orderNumber, $quantity): float
    {
        $randNum = rand(1, 100);

        if ($orderNumber === 1) {
            $largeCarats = config('data-seed.insert-seed.stones.carat.large');
            return $largeCarats[array_rand($largeCarats)]['carat'];
        } elseif ($orderNumber === 2) {
            $middleCarats = config('data-seed.insert-seed.stones.carat.middle');
            return $middleCarats[array_rand($middleCarats)]['carat'];
        }
    }

    private function getQuantity(int $orderNumber): int
    {
        $randNum = rand(1, 100);

        if ($orderNumber === 1) {
            if ($randNum < 80) {
                return 1;
            } elseif ($randNum < 85) {
                return 2;
            } elseif ($randNum < 90) {
                return 3;
            } elseif ($randNum < 95) {
                return 4;
            } else {
                return 5;
            }
        } else {
            if ($randNum < 20) {
                return rand(10, 15);
            } elseif ($randNum < 40) {
                return rand(15, 20);
            } elseif ($randNum < 60) {
                return rand(20, 30);
            } elseif ($randNum < 80) {
                return rand(30, 40);
            } else {
                return rand(40, 50);
            }
        }
    }

    private function getColour(array $colours): string
    {
        $tmp = [];

        //loop through all names
        foreach($this->getArrItems($colours) as $name => $count) {
            //for each entry for a specific name, add name to `$tmp` array

            for ($x = 1; $x <= $count; $x++) {
                $tmp[] = $name;
            }
        }

//        dd(Arr::random($tmp));
        return Arr::random($tmp);
    }

    private function getFacet(array $facets): string
    {
        $tmp = [];

        //loop through all names
        foreach($this->getArrItems($facets) as $name => $count) {
            //for each entry for a specific name, add name to `$tmp` array

            for ($x = 1; $x <= $count; $x++) {
                $tmp[] = $name;
            }
        }

//        dd(Arr::random($tmp));
        return Arr::random($tmp);
    }

    protected function getArrItems(array $arrayItems): array
    {
        $arrItems = [];
        foreach ($arrayItems as $item) {
//            dd($item);
            $arrItems[$item[0]] = $item[1];
        }
//        dd($arrItems);
        return $arrItems;
    }
}