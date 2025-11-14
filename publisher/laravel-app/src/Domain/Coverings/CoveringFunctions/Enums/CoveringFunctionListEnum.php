<?php

declare(strict_types=1);

namespace Domain\Coverings\CoveringFunctions\Enums;

use Domain\Coverings\CoveringTypes\Enums\CoveringTypeListEnum;

enum CoveringFunctionListEnum: string
{
    case DECORATIVE    = 'декоративное';
    case PROTECTIVE    = 'защитное';

    public function description(): string
    {
        return match ($this) {
            self::DECORATIVE => 'Покрытия главным образом предназначены для придания внешнему виду стилистических особенностей',
            self::PROTECTIVE => 'Покрытия предназначены главным образом для улучшения потребительских характеристик',

        };
    }

    public function probability(): int
    {
        return match ($this) {
            self::DECORATIVE => 3,
            self::PROTECTIVE => 2,

        };
    }

    public function coverings(): string
    {
        return match ($this) {
            self::DECORATIVE => CoveringTypeListEnum::ENAMEL->value . ',' . CoveringTypeListEnum::DIAMOND_CUT->value,
            self::PROTECTIVE => CoveringTypeListEnum::GOLDING->value . ',' .
                CoveringTypeListEnum::RHODIUM_PLATING->value . ',' . CoveringTypeListEnum::PLATINIZING->value . ',' .
                CoveringTypeListEnum::PARTLY_GOLDING->value . ',' . CoveringTypeListEnum::PARTLY_RHODIUM_PLATING->value . ',' .
                CoveringTypeListEnum::OXIDATION->value,
        };
    }
}
