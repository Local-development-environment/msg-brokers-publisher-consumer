<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\InsertItems;

use Domain\Jewelleries\Categories\Enums\CategoryBuilderEnum;
use Domain\JewelleryGenerator\Traits\ProbabilityArrayElementTrait;

final class InsertItem
{
    use ProbabilityArrayElementTrait;

    public function getInsert(string $category): array
    {
        $randNum = rand(1, 100);

        if ($category === CategoryBuilderEnum::CHAINS->value || $randNum < 10) {
            return [];
        } elseif ($randNum < 55) {
            $stone = (new SingleInsertGeneration())->getInsert();
            return [
                [
                    'stoneName' => $stone['stoneName'],
                    'facets'    => $this->getArrElement($stone['facets']),
                    'colours'   => $this->getArrElement($stone['colours']),
                    'quantity'  => $stone['quantity'],
                    'weight'    => $stone['weight'],
                ]
            ];
        } elseif ($randNum < 85) {
            $inserts = [];

            $stones = (new DoubleInsertGeneration())->getInsert();

            foreach ($stones as $key => $stone) {
                $inserts[$key] = [
                    'stoneName' => $stone['stoneName'],
                    'facets'    => $this->getArrElement($stone['facets']),
                    'colours'   => $this->getArrElement($stone['colours']),
                    'quantity'  => $stone['quantity'],
                    'weight'    => $stone['weight'],
                ];
            }

            return $inserts;

        } elseif ($randNum < 95) {
            $stone = (new TripleInsertGeneration())->getInsert();
            return [
                [
                    'stoneName' => $stone['stoneName'],
                    'facets'    => $this->getArrElement($stone['facets']),
                    'colours'   => $this->getArrElement($stone['colours']),
                    'quantity'  => $stone['quantity'],
                    'weight'    => $stone['weight'],
                ]
            ];
        } else {
            $stone = (new QuadrupleInsertGeneration())->getInsert();
            return [
                [
                    'stoneName' => $stone['stoneName'],
                    'facets'    => $this->getArrElement($stone['facets']),
                    'colours'   => $this->getArrElement($stone['colours']),
                    'quantity'  => $stone['quantity'],
                    'weight'    => $stone['weight'],
                ]
            ];
        }
    }
}