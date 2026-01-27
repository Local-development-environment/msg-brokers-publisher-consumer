<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Traits;

use Illuminate\Validation\Rules\Enum;

trait TestEnumsTrait
{
    public function removeCases(array $enumCases, array $removeValues): array
    {
        foreach ($enumCases as $key => $enumCase) {
            if ((in_array($enumCase->value, $removeValues)) !== false) {
                unset($enumCases[$key]);
            }
        }
        return array_values($enumCases);
    }

    public function selectCases(array $enumCases, array $selectValues): array
    {
        foreach ($enumCases as $key => $enumCase) {
            if ((in_array($enumCase->value, $selectValues)) === false) {
                unset($enumCases[$key]);
            }
        }
        return array_values($enumCases);
    }
}
