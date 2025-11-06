<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\NeckSizes\Enums;

use Domain\Shared\JewelleryProperties\LengthNames\Enums\LengthNameListEnum;

enum NeckSizeListEnum: int
{
    case SIZE_35  = 35; // collar
    case SIZE_40  = 40; // choker
    case SIZE_45  = 45; // princess
    case SIZE_50  = 50; // matinee
    case SIZE_55  = 55; // matinee
    case SIZE_60  = 60; // matinee
    case SIZE_65  = 65; // matinee
    case SIZE_70  = 70; // opera
    case SIZE_75  = 75; // opera
    case SIZE_80 = 80; // opera
    case SIZE_85 = 85; // opera
    case SIZE_90 = 90; // rope
    case SIZE_95 = 95; // rope
    case SIZE_100 = 100; // rope
    case SIZE_105 = 105; // rope
    case SIZE_110 = 110; // rope
    case SIZE_115 = 115; // rope
    case SIZE_120 = 120; // rope

    public function unitMeasurement(): string
    {
        return match ($this) {
            default => 'см'
        };
    }

    public function lengthNames(): string
    {
        return match ($this) {
            self::SIZE_35 => LengthNameListEnum::COLLAR->value,
            self::SIZE_40 => LengthNameListEnum::CHOKER->value,
            self::SIZE_45 => LengthNameListEnum::PRINCESS->value,
            self::SIZE_50, self::SIZE_55, self::SIZE_60, self::SIZE_65 => LengthNameListEnum::MATINEE->value,
            self::SIZE_70, self::SIZE_85, self::SIZE_80, self::SIZE_75 => LengthNameListEnum::OPERA->value,
            self::SIZE_90, self::SIZE_95, self::SIZE_100, self::SIZE_105, self::SIZE_110, self::SIZE_115,
            self::SIZE_120 => LengthNameListEnum::ROP->value
        };
    }
}
