<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\InsertItems;

use Domain\Jewelleries\Categories\Enums\CategoryBuilderEnum;
use Domain\JewelleryGenerator\Traits\ProbabilityArrayElementTrait;

final class InsertItem
{
    use ProbabilityArrayElementTrait;

    public function getInsert(object $jewellery): array
    {
        $metal    = $jewellery->metalItem['preciousMetals'][0]['preciousMetal'];
        $category = $jewellery->category;

        $randNum = rand(1, 100);
        dump($metal);
        if ($category === CategoryBuilderEnum::CHAINS->value || $randNum < 10) {

            return [];

        } elseif ($randNum < 65) {

            $insert = (new SingleInsertGeneration)->getInsert($jewellery);

            return [
                [
                    'stoneName'  => $insert['stoneName'],
                    'facets'     => $insert['facets'],
                    'colours'    => $insert['colours'],
                    'quantity'   => $insert['quantity'],
                    'weight'     => $insert['weight'],
                    'dimensions' => $insert['dimensions'],
                ]
            ];

        } elseif ($randNum < 85) {

            $firstInsert  = (new SingleInsertGeneration)->getInsert($jewellery);
            $secondInsert = (new DoubleInsertGeneration)->getInsert($firstInsert, 1);

            return [
                [
                    'stoneName'  => $firstInsert['stoneName'],
                    'facets'     => $firstInsert['facets'],
                    'colours'    => $firstInsert['colours'],
                    'quantity'   => $firstInsert['quantity'],
                    'weight'     => $firstInsert['weight'],
                    'dimensions' => $firstInsert['dimensions'],
                ],
                [
                    'stoneName'  => $secondInsert['stoneName'],
                    'facets'     => $secondInsert['facets'],
                    'colours'    => $secondInsert['colours'],
                    'quantity'   => $secondInsert['quantity'],
                    'weight'     => $secondInsert['weight'],
                    'dimensions' => $secondInsert['dimensions'],
                ]
            ];

        } elseif ($randNum < 95) {
            dump(95);
            $inserts = [];
            //
            //            $stones = (new TripleInsertGeneration())->getInsert();
            //
            //            foreach ($stones as $key => $stone) {
            //
            //                $inserts[$key] = [
            //                    'stoneName' => $stone['stoneName'],
            //                    'facets'    => $stone['quantity'] < 10 ?
            //                        $this->getArrElement($stone['facets']) : FacetBuilderEnum::ROUND_CUT->value,
            //                    'colours'   => $this->getArrElement($stone['colours']),
            //                    'quantity'  => $stone['quantity'],
            //                    'weight'    => $stone['weight'],
            //                ];
            //            }
            //
            return $inserts;
        } else {
            $inserts = [];
            //
            //            $stones = (new QuadrupleInsertGeneration())->getInsert();
            //
            //            foreach ($stones as $key => $stone) {
            //
            //                $inserts[$key] = [
            //                    'stoneName' => $stone['stoneName'],
            //                    'facets'    => $stone['quantity'] < 10 ?
            //                        $this->getArrElement($stone['facets']) : FacetBuilderEnum::ROUND_CUT->value,
            //                    'colours'   => $this->getArrElement($stone['colours']),
            //                    'quantity'  => $stone['quantity'],
            //                    'weight'    => $stone['weight'],
            //                ];
            //            }
            //
            return $inserts;
        }
    }
}