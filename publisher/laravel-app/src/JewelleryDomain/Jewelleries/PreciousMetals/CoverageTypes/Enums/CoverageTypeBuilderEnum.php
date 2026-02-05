<?php

namespace JewelleryDomain\Jewelleries\PreciousMetals\CoverageTypes\Enums;

use JewelleryDomain\Jewelleries\PreciousMetals\Coverages\Enums\CoverageBuilderEnum;

enum CoverageTypeBuilderEnum: string
{
    case DECORATION = 'декоративное';
    case PROTECTION = 'защитное';

    public function coverages(): array
    {
        return match ($this) {
            self::DECORATION => [
                CoverageBuilderEnum::DIAMOND_CUT->name,
                CoverageBuilderEnum::ENAMEL->name,
                CoverageBuilderEnum::GOLDING->name
            ],
            self::PROTECTION => [
                CoverageBuilderEnum::OXIDATION->name,
                CoverageBuilderEnum::RHODIUM_PLATING->name,
            ],
        };
    }

    public function description(): string
    {
        return match ($this) {
            self::DECORATION => 'Покрытие, в первую очередь, для улучшения внешнего вида украшения',
            self::PROTECTION => 'Покрытие, в первую очередь, для защиты поверхности металл украшения',
        };
    }
}
