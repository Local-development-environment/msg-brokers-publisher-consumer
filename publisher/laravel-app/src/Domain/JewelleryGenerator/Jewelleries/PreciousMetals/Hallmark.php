<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\PreciousMetals;

use Domain\JewelleryGenerator\Traits\ProbabilityArrayElementTrait;
use Domain\PreciousMetals\Hallmarks\Enums\HallmarkListEnum;
use Illuminate\Support\Arr;

final class Hallmark
{
    use ProbabilityArrayElementTrait;

    public function getHallmark(string $metal): int
    {
        $enumClass = get_class(HallmarkListEnum::H_375);
        $enumCases = HallmarkListEnum::cases();

        foreach ($enumCases as $key => $case) {
            if (! str_contains($case::{$case->name}->metals(), $metal) || $case::{$case->name}->value === 999) {
                Arr::forget($enumCases, $key);
            }
        }

        return $this->getArrElement($enumClass, $enumCases);
    }
}
