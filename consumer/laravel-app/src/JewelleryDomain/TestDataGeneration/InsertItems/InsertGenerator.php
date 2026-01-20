<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\InsertItems;

final class InsertGenerator
{
    public function getInsert(array $properties): array
    {
//        $preciousMetal = data_get($properties, 'preciousMetals.*.preciousMetal');
//        $category = data_get($properties, 'jewelleryCategory');
//
        return $this->getRandomCoverage($preciousMetal, $category);
    }
}
