<?php

namespace JewelleryDomain\Jewellery\Shared\SpecProperties\NeckSizes\Enums;

use JewelleryDomain\Jewellery\Shared\SpecProperties\LengthNames\Enums\LengthNameNamesEnum;

enum NeckSizeValuesEnum: int
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
            self::SIZE_35 => LengthNameNamesEnum::COLLAR->value,
            self::SIZE_40 => LengthNameNamesEnum::CHOKER->value,
            self::SIZE_45 => LengthNameNamesEnum::PRINCESS->value,
            self::SIZE_50, self::SIZE_55, self::SIZE_60, self::SIZE_65 => LengthNameNamesEnum::MATINEE->value,
            self::SIZE_70, self::SIZE_85, self::SIZE_80, self::SIZE_75 => LengthNameNamesEnum::OPERA->value,
            self::SIZE_90, self::SIZE_95, self::SIZE_100, self::SIZE_105, self::SIZE_110, self::SIZE_115,
            self::SIZE_120 => LengthNameNamesEnum::ROP->value
        };
    }
}
