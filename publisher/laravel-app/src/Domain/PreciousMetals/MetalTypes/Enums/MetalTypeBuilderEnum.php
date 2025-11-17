<?php

declare(strict_types=1);

namespace Domain\PreciousMetals\MetalTypes\Enums;

use Domain\Coverings\CoveringTypes\Enums\CoveringTypeBuilderEnum;
use Domain\PreciousMetals\Hallmarks\Enums\HallmarkBuilderEnum;

enum MetalTypeBuilderEnum: string
{
    case GOLDEN    = 'золото';
    case SILVER    = 'серебро';
    case PLATINUM  = 'платина';
    case PALLADIUM = 'палладий';

    public function description(): string
    {
        return match ($this) {
            self::GOLDEN => 'Металл желтого цвета, в ювелирных украшениях в чистом виде не используется, сплавы с другими металлами придают красный и белый оттенки',
            self::SILVER => 'Серебро — благородный металл, отличающийся высокой пластичностью. Изделия из него не ржавеют и не окисляются. Для повышения твердости в него добавляют другие металлы, это предотвращает деформацию изделий.',
            self::PLATINUM => 'Платина — это драгоценный металл серебристо-белого цвета, который является одним из самых дорогих и редких на планете.',
            self::PALLADIUM => 'Палладий относится к драгоценным металлам, но используется для создания украшений намного реже, чем золото, серебро или платина.',
        };
    }

    public function probability(): int
    {
        return match ($this) {
            self::GOLDEN => 40,
            self::SILVER => 35,
            self::PLATINUM => 3,
            self::PALLADIUM => 1,
        };
    }

    public function coverings(): string
    {
        return match ($this) {
            self::GOLDEN => CoveringTypeBuilderEnum::DIAMOND_CUT->value . ',' . CoveringTypeBuilderEnum::ENAMEL->value . ',' .
                CoveringTypeBuilderEnum::RHODIUM_PLATING->value,
            self::SILVER => CoveringTypeBuilderEnum::DIAMOND_CUT->value . ',' . CoveringTypeBuilderEnum::ENAMEL->value . ',' .
                CoveringTypeBuilderEnum::GOLDING->value . ',' .
                CoveringTypeBuilderEnum::RHODIUM_PLATING->value . ',' .
                CoveringTypeBuilderEnum::OXIDATION->value,
            self::PLATINUM, self::PALLADIUM => CoveringTypeBuilderEnum::DIAMOND_CUT->value . ',' .
                CoveringTypeBuilderEnum::ENAMEL->value,
        };
    }

    public function hallmarks(): array
    {
        return match ($this) {
            self::GOLDEN => [
                HallmarkBuilderEnum::H_333->value,
                HallmarkBuilderEnum::H_375->value,
                HallmarkBuilderEnum::H_500->value,
                HallmarkBuilderEnum::H_583->value,
                HallmarkBuilderEnum::H_585->value,
                HallmarkBuilderEnum::H_750->value,
                HallmarkBuilderEnum::H_875->value,
                HallmarkBuilderEnum::H_916->value,
                HallmarkBuilderEnum::H_958->value,
                HallmarkBuilderEnum::H_999->value,
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
