<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\InsertItems\InsertBracelet;

use JewelleryDomain\Jewellery\JewelleryCategoryItems\JewelleryCategory\Enums\JewelleryCategoryNamesEnum;

final class BraceletStone
{
    public function __construct(array $properties)
    {}

    public function getStone()
    {
        $stones = JewelleryCategoryNamesEnum::BRACELETS->stones();

        return $stones[array_rand($stones)];
    }
}
