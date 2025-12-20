<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\InsertItems;

use Domain\JewelleryGenerator\Jewelleries\InsertItems\OrderInserts\FirstInsertGeneration;
use Domain\PreciousMetals\PreciousMetals\Enums\PreciousMetalBuilderEnum;

final class SingleInsertGeneration
{
    public function getInsert(object $jewellery): array
    {
        $metal = $jewellery->metalItem['preciousMetals'][0]['preciousMetal'];

        if ($metal === PreciousMetalBuilderEnum::SILVER->value) {

            return (new FirstInsertGeneration())->getFirstInsertSilverJewellery();

        } elseif ($metal === PreciousMetalBuilderEnum::GOLDEN_YELLOW->value ||
            $metal === PreciousMetalBuilderEnum::GOLDEN_RED->value) {

            return (new FirstInsertGeneration())->getFirstInsertGoldenJewellery();

        } else {

            return (new FirstInsertGeneration())->getFirstInsertPlatinumJewellery();

        }
    }

}