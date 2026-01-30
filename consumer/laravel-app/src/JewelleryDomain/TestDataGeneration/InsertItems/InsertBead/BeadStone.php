<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\InsertItems\InsertBead;

use JewelleryDomain\Jewellery\JewelleryCategoryItems\JewelleryCategory\Enums\JewelleryCategoryNamesEnum;

final class BeadStone
{
    public function __construct(array $properties)
    {}

    public function getStone()
    {
        $stones = JewelleryCategoryNamesEnum::BEADS->stones();

        return $stones[array_rand($stones)];
    }
}
