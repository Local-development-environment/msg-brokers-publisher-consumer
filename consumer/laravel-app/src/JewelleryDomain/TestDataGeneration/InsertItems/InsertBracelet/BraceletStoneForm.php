<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\InsertItems\InsertBracelet;

use JewelleryDomain\Jewellery\InsertItems\Stone\Enums\StoneNamesEnum;

final class BraceletStoneForm
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
