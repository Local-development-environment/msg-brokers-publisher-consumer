<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\InsertItems\InsertBracelet;

use JewelleryDomain\Jewellery\Stones\Stone\Enums\StoneNamesEnum;

final class BraceletStoneColour
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
