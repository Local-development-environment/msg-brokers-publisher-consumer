<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewellery\SpecProperties\Bracelets\BraceletSize\Enums;

enum BraceletSizeValuesEnum: int
{
    case BRACELET_13  = 13;
    case BRACELET_14  = 14;
    case BRACELET_15  = 15;
    case BRACELET_16  = 16;
    case BRACELET_17  = 17;
    case BRACELET_18  = 18;
    case BRACELET_19  = 19;
    case BRACELET_20  = 20;
    case BRACELET_21  = 21;
    case BRACELET_22 = 22;
    case BRACELET_23 = 23;
    case BRACELET_24 = 24;

    public function wrist(): string
    {
        return match ($this) {
            self::BRACELET_13  => 'обхват запястья около 12 см',
            self::BRACELET_14  => 'обхват запястья около 13 см',
            self::BRACELET_15  => 'обхват запястья около 14 см',
            self::BRACELET_16  => 'обхват запястья около 15 см',
            self::BRACELET_17  => 'обхват запястья около 16 см',
            self::BRACELET_18  => 'обхват запястья около 17 см',
            self::BRACELET_19  => 'обхват запястья около 18 см',
            self::BRACELET_20  => 'обхват запястья около 19 см',
            self::BRACELET_21  => 'обхват запястья около 20 см',
            self::BRACELET_22 => 'обхват запястья около 21 см',
            self::BRACELET_23 => 'обхват запястья около 22 см',
            self::BRACELET_24 => 'обхват запястья около 23 см',
        };
    }

    public function unitMeasurement(): string
    {
        return 'см';
    }
}
