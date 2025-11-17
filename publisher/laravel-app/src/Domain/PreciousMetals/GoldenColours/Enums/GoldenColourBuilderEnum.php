<?php

declare(strict_types=1);

namespace Domain\PreciousMetals\GoldenColours\Enums;

use Domain\PreciousMetals\Hallmarks\Enums\HallmarkBuilderEnum;

enum GoldenColourBuilderEnum: string
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
            self::WHITE  => HallmarkBuilderEnum::H_750->value . ',' . HallmarkBuilderEnum::H_875->value . ',' .
                HallmarkBuilderEnum::H_585->value,
            self::RED    => HallmarkBuilderEnum::H_375->value . ',' . HallmarkBuilderEnum::H_500->value . ',' .
                HallmarkBuilderEnum::H_583->value . ',' . HallmarkBuilderEnum::H_585->value . ',' . HallmarkBuilderEnum::H_333->value,
            self::YELLOW => HallmarkBuilderEnum::H_916->value . ',' . HallmarkBuilderEnum::H_958->value . ',' .
                HallmarkBuilderEnum::H_875->value . ',' . HallmarkBuilderEnum::H_583->value . ',' .
                HallmarkBuilderEnum::H_585->value . ',' . HallmarkBuilderEnum::H_750->value . ',' . HallmarkBuilderEnum::H_333->value,
            self::PINK   => HallmarkBuilderEnum::H_750->value . ',' . HallmarkBuilderEnum::H_585->value,
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
