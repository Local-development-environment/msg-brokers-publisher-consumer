<?php

namespace JewelleryDomain\Jewellery\BeadItems\BeadCabochonForm\Enums;

enum BeadCabochonFormNamesEnum: string
{
    case PEAR_CABOCHON   = 'груша кабошон';
    case OVAL_CABOCHON   = 'овал кабошон';
    case RONDEL_CABOCHON = 'рондель кабошон';
    case SPHERE_CABOCHON = 'шар кабошон';

    public function description(): string
    {
        return match ($this) {
            self::PEAR_CABOCHON   => 'бусина кабошон в форме груши или капли без граней',
            self::OVAL_CABOCHON   => 'бусина овальной формы без граней',
            self::RONDEL_CABOCHON => 'бусина в форме приплюснутой сферы без граней',
            self::SPHERE_CABOCHON => 'бусина в форме гладкого (без граней) шара',
        };
    }
}
