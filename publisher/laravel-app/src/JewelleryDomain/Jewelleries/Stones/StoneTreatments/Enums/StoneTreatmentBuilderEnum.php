<?php

namespace JewelleryDomain\Jewelleries\Stones\StoneTreatments\Enums;

enum StoneTreatmentBuilderEnum: string
{
    case CABOCHON = 'кабошон';
    case FACET = 'с фасетная';

    public function description(): string
    {
        return match ($this) {
            self::CABOCHON => 'обработка камня полировкой до гладкой поверхности',
            self::FACET    => 'обработка камня созданием граней',
        };
    }
}
