<?php

declare(strict_types=1);

namespace Domain\PreciousMetals\MetalColours\Enums;

use Domain\PreciousMetals\Hallmarks\Enums\HallmarkListEnum;

enum GoldenColourListEnum: string
{
    case WHITE  = 'белый';
    case RED    = 'красный';
    case YELLOW = 'желтый';
    case PINK  = 'розовый';

    public function descriptions(): string
    {
        return match ($this) {
            self::WHITE  => 'Белый цвет имеет серебро, платина, палладий и золото с примесью серебра, никеля или платины',
            self::RED    => 'Красный цвет имеет золото с добавлением большего количества меди',
            self::YELLOW => 'Желтый цвет имеет позолоченное серебро и золото с добавлением равных долей меди и серебра',
            self::PINK   => 'Розовый цвет имеет золото с несколько большим добавлением меди чем серебра',
        };
    }

    public function hallmarks(): string
    {
        return match ($this) {
            self::WHITE  => HallmarkListEnum::H_750->value . ',' . HallmarkListEnum::H_875->value . ',' .
                HallmarkListEnum::H_585->value,
            self::RED    => HallmarkListEnum::H_375->value . ',' . HallmarkListEnum::H_500->value . ',' .
                HallmarkListEnum::H_583->value . ',' . HallmarkListEnum::H_585->value . ',' . HallmarkListEnum::H_333->value,
            self::YELLOW => HallmarkListEnum::H_916->value . ',' . HallmarkListEnum::H_958->value . ',' .
                HallmarkListEnum::H_875->value . ',' . HallmarkListEnum::H_583->value . ',' .
                HallmarkListEnum::H_585->value . ',' . HallmarkListEnum::H_750->value . ',' . HallmarkListEnum::H_333->value,
            self::PINK   => HallmarkListEnum::H_750->value . ',' . HallmarkListEnum::H_585->value,
        };
    }

    public function probability(): int
    {
        return match ($this) {
            self::WHITE => 30,
            self::RED => 50,
            self::YELLOW => 20,
            self::PINK => 15,

        };
    }
}
