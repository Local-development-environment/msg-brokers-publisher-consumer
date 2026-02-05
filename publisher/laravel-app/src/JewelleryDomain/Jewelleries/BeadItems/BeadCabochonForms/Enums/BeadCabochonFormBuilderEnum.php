<?php

namespace JewelleryDomain\Jewelleries\BeadItems\BeadCabochonForms\Enums;

enum BeadCabochonFormBuilderEnum: string
{
    case PEAR            = 'груша кабошон';
    case OVAL_CABOCHON   = 'овал кабошон';
    case RONDEL_CABOCHON = 'рондель кабошон';
    case SPHERE          = 'шар кабошон';

    public function description(): string
    {
        return match ($this) {
            self::PEAR            => 'бусина кабошон в форме груши или капли без граней',
            self::OVAL_CABOCHON   => 'бусина овальной формы без граней',
            self::RONDEL_CABOCHON => 'бусина в форме приплюснутой сферы без граней',
            self::SPHERE          => 'бусина в форме гладкого (без граней) шара',
        };
    }
}
