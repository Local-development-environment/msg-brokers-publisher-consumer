<?php

declare(strict_types=1);

namespace Domain\Coverings\CoveringFunctions\Enums;

enum CoveringFunctionListEnum: string
{
    case DECORATIVE    = 'декоративное';
    case PROTECTIVE    = 'защитное';

    public function description(): string
    {
        return match ($this) {
            self::DECORATIVE => '',
            self::PROTECTIVE => '',

        };
    }

    public function probability(): int
    {
        return match ($this) {
            self::DECORATIVE => 3,
            self::PROTECTIVE => 2,

        };
    }
}
