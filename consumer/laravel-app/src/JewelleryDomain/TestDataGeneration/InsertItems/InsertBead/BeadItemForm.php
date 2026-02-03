<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\InsertItems\InsertBead;

use JewelleryDomain\Jewellery\BeadItems\BeadItem\Enums\BeadItemNamesEnum;
use JewelleryDomain\Jewellery\Stones\Stone\Enums\StoneNamesEnum;

final class BeadItemForm
{
    public function __construct(array $properties)
    {
    }

    public function getBeadForm(string $beadItem): array|string
    {
        $enumName = BeadItemNamesEnum::from($beadItem);

        $forms = data_get(BeadItemNamesEnum::{$enumName->name}->beadForms(), '*.0');

        return $forms[array_rand($forms)];
    }
}
