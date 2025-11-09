<?php

declare(strict_types=1);

namespace Domain\PreciousMetals\Metals\Enums;

enum MetalListEnum: string
{
    case GOLDEN    = 'золото';
    case SILVER    = 'серебро';
    case PLATINUM  = 'платина';
    case PALLADIUM = 'палладий';

    public function description(): string
    {
        return match ($this) {
            self::GOLDEN => 'Металл желтого цвета, в ювелирных украшениях в чистом виде не используется, сплавы с другими металлами придают красный и белый оттенки',
            self::SILVER => '',
            self::PLATINUM => '',
            self::PALLADIUM => '',

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
