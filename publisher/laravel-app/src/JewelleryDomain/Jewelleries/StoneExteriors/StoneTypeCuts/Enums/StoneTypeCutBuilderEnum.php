<?php

namespace JewelleryDomain\Jewelleries\StoneExteriors\StoneTypeCuts\Enums;

enum StoneTypeCutBuilderEnum: string
{
    case BRILLIANT_CUT = 'бриллиантовая огранка';
    case STEP_CUT      = 'ступерчатая огранка';
    case HYBRID_CUT    = 'гибридная огранка';

    public function description(): string
    {
        return match ($this) {
            self::BRILLIANT_CUT => 'грани расположены клиньями, максимизируя блеск',
            self::STEP_CUT      => 'грани расположены параллельно друг другу',
            self::HYBRID_CUT    => 'грани могут быть расположены как клиньями, так и параллельно друг другу.',
        };
    }
}
