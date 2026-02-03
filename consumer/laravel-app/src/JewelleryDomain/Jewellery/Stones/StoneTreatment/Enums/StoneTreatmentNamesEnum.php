<?php

namespace JewelleryDomain\Jewellery\Stones\StoneTreatment\Enums;

enum StoneTreatmentNamesEnum: string
{
    case CABOCHON = 'кабошон';
    case FACET = 'фасетная';

    public function description(): string
    {
        return match ($this) {
            self::CABOCHON => 'обработка камня полировкой до гладкой поверхности',
            self::FACET    => 'обработка камня созданием граней',
        };
    }
}
