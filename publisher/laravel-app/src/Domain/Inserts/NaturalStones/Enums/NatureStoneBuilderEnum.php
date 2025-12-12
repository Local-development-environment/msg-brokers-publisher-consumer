<?php

declare(strict_types=1);

namespace Domain\Inserts\NaturalStones\Enums;

use Domain\Inserts\StoneGroups\Enums\StoneGroupBuilderEnum;

enum NatureStoneBuilderEnum: string
{
    case DIAMOND = 'бриллиант';
    case ALEXANDRITE = 'александрит';
    case SEE_PEARL_NATURE = 'жемчуг морской натуральный';
    case EMERALD = 'изумруд';
    case RUBY = 'рубин';
    case SAPPHIRE = 'сапфир';

    public function groups(): string
    {
        return match ($this) {
            self::DIAMOND,
            self::ALEXANDRITE,
            self::SEE_PEARL_NATURE,
            self::EMERALD,
            self::RUBY,
            self::SAPPHIRE => StoneGroupBuilderEnum::PRECIOUS->value,
        };
    }
}
