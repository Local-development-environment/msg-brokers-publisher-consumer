<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\InsertItems\InsertBead;

use JewelleryDomain\Jewellery\InsertItems\Stone\Enums\StoneNamesEnum;

final class BeadStoneColour
{
    public function __construct(array $properties)
    {}

    public function getColour(string $stone): array|string
    {
        $enumName = StoneNamesEnum::from($stone);

        $colours = data_get(StoneNamesEnum::{$enumName->name}->stoneColours(), '*.0');

        return $colours[array_rand($colours)];
    }
}
