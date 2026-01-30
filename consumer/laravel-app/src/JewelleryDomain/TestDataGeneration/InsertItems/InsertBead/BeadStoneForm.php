<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\InsertItems\InsertBead;

use JewelleryDomain\Jewellery\InsertItems\Stone\Enums\StoneNamesEnum;
use JewelleryDomain\Jewellery\JewelleryCategoryItems\JewelleryCategory\Enums\JewelleryCategoryNamesEnum;

final class BeadStoneForm
{
    public function __construct(array $properties)
    {}

    public function getForm(string $stone): array|string
    {
        $enumName = StoneNamesEnum::from($stone);

        $forms = data_get(StoneNamesEnum::{$enumName->name}->forms(), '*.0');

        return $forms[array_rand($forms)];
    }
}
