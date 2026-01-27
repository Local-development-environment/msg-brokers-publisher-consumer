<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewellery\PreciousMetalItems\PreciousMetal\Enums;

use JewelleryDomain\Jewellery\CoverageItems\Coverage\Enums\CoverageNamesEnum;
use JewelleryDomain\Jewellery\PreciousMetalItems\Hallmark\Enums\HallmarkNamesEnum;

enum PreciousMetalNamesEnum: string
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
                CoverageNamesEnum::DIAMOND_CUT->value,
                CoverageNamesEnum::ENAMEL->value,
                CoverageNamesEnum::RHODIUM_PLATING->value
            ],
            self::SILVER => [
                CoverageNamesEnum::DIAMOND_CUT->value,
                CoverageNamesEnum::ENAMEL->value,
                CoverageNamesEnum::GOLDING->value,
                CoverageNamesEnum::RHODIUM_PLATING->value,
                CoverageNamesEnum::OXIDATION->value
            ],
            self::PLATINUM, self::PALLADIUM => [
                CoverageNamesEnum::DIAMOND_CUT->value,
                CoverageNamesEnum::ENAMEL->value
            ]
        };
    }

    public function hallmarks(): array
    {
        return match ($this) {
            self::GOLDEN_RED => [
                HallmarkNamesEnum::H_375->value,
                HallmarkNamesEnum::H_500->value,
                HallmarkNamesEnum::H_583->value,
                HallmarkNamesEnum::H_585->value,
                HallmarkNamesEnum::H_333->value
            ],
            self::GOLDEN_WHITE => [
                HallmarkNamesEnum::H_750->value,
                HallmarkNamesEnum::H_875->value,
                HallmarkNamesEnum::H_585->value,
            ],
            self::GOLDEN_YELLOW => [
                HallmarkNamesEnum::H_916->value,
                HallmarkNamesEnum::H_958->value,
                HallmarkNamesEnum::H_875->value,
                HallmarkNamesEnum::H_583->value,
                HallmarkNamesEnum::H_585->value,
                HallmarkNamesEnum::H_750->value,
                HallmarkNamesEnum::H_333->value,
            ],
            self::SILVER => [
                HallmarkNamesEnum::H_800->value,
                HallmarkNamesEnum::H_830->value,
                HallmarkNamesEnum::H_875->value,
                HallmarkNamesEnum::H_925->value,
                HallmarkNamesEnum::H_960->value,
                HallmarkNamesEnum::H_999->value,
            ],
            self::PLATINUM => [
                HallmarkNamesEnum::H_585->value,
                HallmarkNamesEnum::H_850->value,
                HallmarkNamesEnum::H_900->value,
                HallmarkNamesEnum::H_950->value,
                HallmarkNamesEnum::H_999->value,
            ],
            self::PALLADIUM => [
                HallmarkNamesEnum::H_500->value,
                HallmarkNamesEnum::H_850->value,
                HallmarkNamesEnum::H_999->value,
            ],
        };
    }
}
