<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\InsertItems;

use JewelleryDomain\Jewellery\Stones\StoneTreatment\Enums\StoneTreatmentNamesEnum;

final class FormType
{
    public function __construct()
    {}

    public function getFormType(): string
    {
        $formTypeKey = array_rand(StoneTreatmentNamesEnum::cases());

        return StoneTreatmentNamesEnum::cases()[$formTypeKey]->value;
    }
}
