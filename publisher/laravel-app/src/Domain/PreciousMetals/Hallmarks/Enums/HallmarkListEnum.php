<?php

declare(strict_types=1);

namespace Domain\PreciousMetals\Hallmarks\Enums;

use Domain\PreciousMetals\Metals\Enums\MetalListEnum;

enum HallmarkListEnum: int
{
    case H_375 = 375;
    case H_500 = 500;
    case H_585 = 585;
    case H_750 = 750;
    case H_800 = 800;
    case H_830 = 830;
    case H_850 = 850;
    case H_875 = 875;
    case H_900 = 900;
    case H_916 = 916;
    case H_925 = 925;
    case H_950 = 950;
    case H_958 = 958;
    case H_960 = 960;
    case H_999 = 999;

    public function metals(): string
    {
        return match ($this) {
            self::H_375 => MetalListEnum::GOLDEN->value,
            self::H_500 => MetalListEnum::PALLADIUM->value,
            self::H_585 => MetalListEnum::GOLDEN->value,
            self::H_750 => MetalListEnum::GOLDEN->value,
            self::H_800 => MetalListEnum::SILVER->value,
            self::H_830 => '',
            self::H_850 => MetalListEnum::PLATINUM->value,
            self::H_875 => MetalListEnum::SILVER->value,
            self::H_900 => MetalListEnum::PLATINUM->value,
            self::H_916 => MetalListEnum::SILVER->value,
            self::H_925 => MetalListEnum::SILVER->value,
            self::H_950 => MetalListEnum::PLATINUM->value . ', ' . MetalListEnum::PALLADIUM->value,
            self::H_958 => '',
            self::H_960 => MetalListEnum::SILVER->value,
            self::H_999 => MetalListEnum::PALLADIUM->value,

        };
    }

    public function probability(): int
    {
        return match ($this) {
            self::H_375 => 10, // golden
            self::H_500 => 5,  // palladium
            self::H_585 => 50, // golden
            self::H_750 => 20, // golden
            self::H_800 => 2,  // silver
            self::H_830 => 0,
            self::H_850 => 10, // platinum
            self::H_875 => 10, // silver
            self::H_900 => 10, // platinum
            self::H_916 => 5,  // silver
            self::H_925 => 50, // silver
            self::H_950 => 10, // platinum, palladium
            self::H_958 => 0,
            self::H_960 => 20, // silver
            self::H_999 => 10, // palladium
        };
    }
}
