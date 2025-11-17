<?php

declare(strict_types=1);

namespace Domain\Coverings\CoveringFunctions\Enums;

use Domain\Coverings\CoveringTypes\Enums\CoveringTypeBuilderEnum;

enum CoveringFunctionBuilderEnum: string
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
            self::DECORATIVE => CoveringTypeBuilderEnum::ENAMEL->value . ',' . CoveringTypeBuilderEnum::DIAMOND_CUT->value . ',' .
                CoveringTypeBuilderEnum::OXIDATION->value,
            self::PROTECTIVE => CoveringTypeBuilderEnum::GOLDING->value . ',' .
                CoveringTypeBuilderEnum::RHODIUM_PLATING->value,
        };
    }
}
