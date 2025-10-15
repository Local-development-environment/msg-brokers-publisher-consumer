<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\BraceletSizes\Enums;

enum BraceletSizeListEnum: int
{
    case S13  = 13;
    case S14  = 14;
    case S15  = 15;
    case M16  = 16;
    case M17  = 17;
    case M18  = 18;
    case L19  = 19;
    case L20  = 20;
    case L21  = 21;
    case XL22 = 22;
    case XL23 = 23;
    case XL24 = 24;
    
    public function wrist(): string
    {
        return match ($this) {
            self::S13  => 'обхват запястья около 12 см',
            self::S14  => 'обхват запястья около 13 см',
            self::S15  => 'обхват запястья около 14 см',
            self::M16  => 'обхват запястья около 15 см',
            self::M17  => 'обхват запястья около 16 см',
            self::M18  => 'обхват запястья около 17 см',
            self::L19  => 'обхват запястья около 18 см',
            self::L20  => 'обхват запястья около 19 см',
            self::L21  => 'обхват запястья около 20 см',
            self::XL22 => 'обхват запястья около 21 см',
            self::XL23 => 'обхват запястья около 22 см',
            self::XL24 => 'обхват запястья около 23 см',
        };
    }

    public function unitMeasurement(): string
    {
        return match ($this) {
            default => 'см',
        };
    }
}
