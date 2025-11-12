<?php

declare(strict_types=1);

namespace Domain\PreciousMetals\MetalTypes\Enums;

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
}
