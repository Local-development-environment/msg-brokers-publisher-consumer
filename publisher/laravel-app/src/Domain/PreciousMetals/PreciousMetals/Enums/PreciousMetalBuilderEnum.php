<?php

declare(strict_types=1);

namespace Domain\PreciousMetals\PreciousMetals\Enums;

use Domain\PreciousMetals\Coverages\Enums\CoverageBuilderEnum;
use Domain\PreciousMetals\Hallmarks\Enums\HallmarkBuilderEnum;

enum PreciousMetalBuilderEnum: string
{
    case GOLDEN_RED    = 'красное золото';
    case GOLDEN_WHITE  = 'белое золото';
    case GOLDEN_YELLOW = 'желтое золото';
    case SILVER        = 'серебро';
    case PLATINUM      = 'платина';
    case PALLADIUM     = 'палладий';

    public function description(): string
    {
        return match ($this) {
            self::GOLDEN_RED    => 'Красное золото — это сплав золота с медью, которая придает ему характерный красноватый оттенок. Чем больше меди в сплаве, тем интенсивнее красный цвет. В состав также часто добавляют серебро и другие металлы для прочности и изменения оттенка. Красное золото отличается высокой прочностью, долговечностью и популярно для изготовления ювелирных украшений.',
            self::GOLDEN_WHITE  => 'Белое золото — это ювелирный сплав чистого золота с добавлением других белых металлов, таких как палладий, никель или серебро, чтобы придать ему белый цвет',
            self::GOLDEN_YELLOW => 'Желтое золото — это сплав золота с другими металлами, обычно серебром и медью, для придания ему классического золотистого цвета и повышения прочности.',
            self::SILVER        => 'Серебро — благородный металл, отличающийся высокой пластичностью. Изделия из него не ржавеют и не окисляются. Для повышения твердости в него добавляют другие металлы, это предотвращает деформацию изделий.',
            self::PLATINUM      => 'Платина — это драгоценный металл серебристо-белого цвета, который является одним из самых дорогих и редких на планете.',
            self::PALLADIUM     => 'Палладий относится к драгоценным металлам, но используется для создания украшений намного реже, чем золото, серебро или платина.',
        };
    }

    public function jwProbability(): int
    {
        return match ($this) {
            self::GOLDEN_RED,
            self::GOLDEN_YELLOW,
            self::GOLDEN_WHITE => 20,
            self::SILVER       => 35,
            self::PLATINUM     => 4,
            self::PALLADIUM    => 1,
        };
    }

    public function coverages(): array
    {
        return match ($this) {
            self::GOLDEN_YELLOW,
            self::GOLDEN_WHITE,
            self::GOLDEN_RED => [
                CoverageBuilderEnum::DIAMOND_CUT->value,
                CoverageBuilderEnum::ENAMEL->value,
                CoverageBuilderEnum::RHODIUM_PLATING->value
            ],
            self::SILVER => [
                CoverageBuilderEnum::DIAMOND_CUT->value,
                CoverageBuilderEnum::ENAMEL->value,
                CoverageBuilderEnum::GOLDING->value,
                CoverageBuilderEnum::RHODIUM_PLATING->value,
                CoverageBuilderEnum::OXIDATION->value
            ],
            self::PLATINUM, self::PALLADIUM => [
                CoverageBuilderEnum::DIAMOND_CUT->value,
                CoverageBuilderEnum::ENAMEL->value
            ]
        };
    }

    public function hallmarks(): array
    {
        return match ($this) {
            self::GOLDEN_RED => [
                HallmarkBuilderEnum::H_375->value,
                HallmarkBuilderEnum::H_500->value,
                HallmarkBuilderEnum::H_583->value,
                HallmarkBuilderEnum::H_585->value,
                HallmarkBuilderEnum::H_333->value
            ],
            self::GOLDEN_WHITE => [
                HallmarkBuilderEnum::H_750->value,
                HallmarkBuilderEnum::H_875->value,
                HallmarkBuilderEnum::H_585->value,
            ],
            self::GOLDEN_YELLOW => [
                HallmarkBuilderEnum::H_916->value,
                HallmarkBuilderEnum::H_958->value,
                HallmarkBuilderEnum::H_875->value,
                HallmarkBuilderEnum::H_583->value,
                HallmarkBuilderEnum::H_585->value,
                HallmarkBuilderEnum::H_750->value,
                HallmarkBuilderEnum::H_333->value,
            ],
            self::SILVER => [
                HallmarkBuilderEnum::H_800->value,
                HallmarkBuilderEnum::H_830->value,
                HallmarkBuilderEnum::H_875->value,
                HallmarkBuilderEnum::H_925->value,
                HallmarkBuilderEnum::H_960->value,
                HallmarkBuilderEnum::H_999->value,
            ],
            self::PLATINUM => [
                HallmarkBuilderEnum::H_585->value,
                HallmarkBuilderEnum::H_850->value,
                HallmarkBuilderEnum::H_900->value,
                HallmarkBuilderEnum::H_950->value,
                HallmarkBuilderEnum::H_999->value,
            ],
            self::PALLADIUM => [
                HallmarkBuilderEnum::H_500->value,
                HallmarkBuilderEnum::H_850->value,
                HallmarkBuilderEnum::H_999->value,
            ],
        };
    }
}
