<?php

declare(strict_types=1);

namespace Domain\Coverings\CoveringTypes\Enums;

use Domain\Coverings\CoveringFunctions\Enums\CoveringFunctionListEnum;

enum CoveringTypeListEnum: string
{
    case PLATINIZING     = 'платинирование';
    case GOLDING         = 'золочение';
    case RHODIUM_PLATING = 'родирование';
    case OXIDATION       = 'оксидирование';
    case DIAMOND_CUT     = 'алмазная грань';
    case ENAMEL          = 'эмаль';

    public function description(): string
    {
        return match ($this) {
            self::PLATINIZING => throw new \Exception('To be implemented'),
            self::GOLDING => throw new \Exception('To be implemented'),
            self::RHODIUM_PLATING => throw new \Exception('To be implemented'),
            self::OXIDATION => throw new \Exception('To be implemented'),
            self::DIAMOND_CUT => throw new \Exception('To be implemented'),
            self::ENAMEL => throw new \Exception('To be implemented'),
        };
    }

    public function functions(): string
    {
        return match ($this) {
            self::PLATINIZING, self::GOLDING, self::RHODIUM_PLATING,
            self::OXIDATION => CoveringFunctionListEnum::PROTECTIVE->value,
            self::DIAMOND_CUT, self::ENAMEL => CoveringFunctionListEnum::DECORATIVE->value
        };
    }
}
