<?php

declare(strict_types=1);

namespace Domain\PreciousMetals\MetalTypes\Enums;

use Domain\Coverings\CoveringTypes\Enums\CoveringTypeListEnum;

enum MetalTypeListEnum: string
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
            self::GOLDEN => CoveringTypeListEnum::DIAMOND_CUT->value . ',' . CoveringTypeListEnum::ENAMEL->value . ',' .
                CoveringTypeListEnum::PARTLY_RHODIUM_PLATING->value . ',' . CoveringTypeListEnum::RHODIUM_PLATING->value,
            self::SILVER => CoveringTypeListEnum::DIAMOND_CUT->value . ',' . CoveringTypeListEnum::ENAMEL->value . ',' .
                CoveringTypeListEnum::PARTLY_RHODIUM_PLATING->value . ',' . CoveringTypeListEnum::GOLDING->value . ',' .
                CoveringTypeListEnum::PARTLY_GOLDING->value . ',' . CoveringTypeListEnum::RHODIUM_PLATING->value . ',' .
                CoveringTypeListEnum::OXIDATION->value,
            self::PLATINUM, self::PALLADIUM => CoveringTypeListEnum::DIAMOND_CUT->value . ',' .
                CoveringTypeListEnum::ENAMEL->value,
        };
    }
}
