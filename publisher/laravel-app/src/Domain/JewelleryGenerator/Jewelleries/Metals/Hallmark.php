<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\Metals;

use Domain\JewelleryGenerator\Traits\ProbabilityArrayElementTrait;
use Domain\PreciousMetals\Hallmarks\Enums\HallmarkBuilderEnum;
use Domain\PreciousMetals\Hallmarks\Enums\HallmarkEnum;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

final class Hallmark
{
    use ProbabilityArrayElementTrait;

    public function getHallmark(string $metalTypeName): ?object
    {
        $enumClass = get_class(HallmarkBuilderEnum::H_375);
        $enumCases = HallmarkBuilderEnum::cases();

        foreach ($enumCases as $key => $case) {
            if (! str_contains($case::{$case->name}->metals(), $metalTypeName) || $case::{$case->name}->value === 999) {
                Arr::forget($enumCases, $key);
            }
        }

        $hallmark = $this->getArrElement($enumClass, $enumCases);

        return DB::table(HallmarkEnum::TABLE_NAME->value)->where('value', $hallmark)->first();
    }
}
