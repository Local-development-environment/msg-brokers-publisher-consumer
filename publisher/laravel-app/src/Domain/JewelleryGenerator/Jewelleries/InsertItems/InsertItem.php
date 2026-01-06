<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\InsertItems;

use Domain\Inserts\Facets\Enums\FacetBuilderEnum;
use Domain\Inserts\Stones\Enums\StoneBuilderEnum;
use Domain\Jewelleries\JewelleryCategories\Enums\JewelleryCategoryBuilderEnum;
use Domain\JewelleryGenerator\Traits\ProbabilityArrayElementTrait;

final class InsertItem
{
    use ProbabilityArrayElementTrait;

    public function getInsert(object $jewellery): array
    {
        $metal    = $jewellery->metalItem['preciousMetals'][0]['preciousMetal'];
        $category = $jewellery->category;

        $randNum = rand(1, 100);

        if ($category === JewelleryCategoryBuilderEnum::CHAINS->value || $randNum < 10) {

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
            $secondInsert = (new DoubleInsertGeneration)->getInsert();

            if ($secondInsert['stoneName'] === StoneBuilderEnum::SEA_PEARL_NATURE->value) {
                $secondInsert['facets']   = FacetBuilderEnum::CABOCHON_ROUND->value;
            } else {
                $secondInsert['facets']   = FacetBuilderEnum::ROUND_CUT->value;
            }

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

            $firstInsert  = (new SingleInsertGeneration)->getInsert($jewellery);
            $secondInsert = (new DoubleInsertGeneration)->getInsert();
            $thirdInsert  = (new TripleInsertGeneration)->getInsert();

            $secondInsert['quantity'] = rand(8, 16);

            if ($secondInsert['stoneName'] === StoneBuilderEnum::SEA_PEARL_NATURE->value) {
                $secondInsert['facets']   = FacetBuilderEnum::CABOCHON_ROUND->value;
            } else {
                $secondInsert['facets']   = FacetBuilderEnum::ROUND_CUT->value;
            }

            if ($thirdInsert['stoneName'] === StoneBuilderEnum::SEA_PEARL_NATURE->value) {
                $thirdInsert['facets']   = FacetBuilderEnum::CABOCHON_ROUND->value;
            } else {
                $thirdInsert['facets']   = FacetBuilderEnum::ROUND_CUT->value;
            }


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
                ],
                [
                    'stoneName'  => $thirdInsert['stoneName'],
                    'facets'     => $thirdInsert['facets'],
                    'colours'    => $thirdInsert['colours'],
                    'quantity'   => $thirdInsert['quantity'],
                    'weight'     => $thirdInsert['weight'],
                    'dimensions' => $thirdInsert['dimensions'],
                ]
            ];

        } else {

            $firstInsert  = (new SingleInsertGeneration)->getInsert($jewellery);
            $secondInsert = (new DoubleInsertGeneration)->getInsert();
            $thirdInsert  = (new TripleInsertGeneration)->getInsert();
            $forthInsert  = (new QuadrupleInsertGeneration)->getInsert();

            $secondInsert['quantity'] = rand(8, 12);
            $thirdInsert['quantity'] = rand(15, 20);

            if ($secondInsert['stoneName'] === StoneBuilderEnum::SEA_PEARL_NATURE->value) {
                $secondInsert['facets']   = FacetBuilderEnum::CABOCHON_ROUND->value;
            } else {
                $secondInsert['facets']   = FacetBuilderEnum::ROUND_CUT->value;
            }

            if ($thirdInsert['stoneName'] === StoneBuilderEnum::SEA_PEARL_NATURE->value) {
                $thirdInsert['facets']   = FacetBuilderEnum::CABOCHON_ROUND->value;
            } else {
                $thirdInsert['facets']   = FacetBuilderEnum::ROUND_CUT->value;
            }

            if ($forthInsert['stoneName'] === StoneBuilderEnum::SEA_PEARL_NATURE->value) {
                $forthInsert['facets']   = FacetBuilderEnum::CABOCHON_ROUND->value;
            } else {
                $forthInsert['facets']   = FacetBuilderEnum::ROUND_CUT->value;
            }

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
                ],
                [
                    'stoneName'  => $thirdInsert['stoneName'],
                    'facets'     => $thirdInsert['facets'],
                    'colours'    => $thirdInsert['colours'],
                    'quantity'   => $thirdInsert['quantity'],
                    'weight'     => $thirdInsert['weight'],
                    'dimensions' => $thirdInsert['dimensions'],
                ],
                [
                    'stoneName'  => $forthInsert['stoneName'],
                    'facets'     => $forthInsert['facets'],
                    'colours'    => $forthInsert['colours'],
                    'quantity'   => $forthInsert['quantity'],
                    'weight'     => $forthInsert['weight'],
                    'dimensions' => $forthInsert['dimensions'],
                ]
            ];
        }
    }
}
