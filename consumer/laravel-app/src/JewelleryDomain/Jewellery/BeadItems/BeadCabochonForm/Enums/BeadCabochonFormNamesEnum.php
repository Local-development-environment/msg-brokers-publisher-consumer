<?php

namespace JewelleryDomain\Jewellery\BeadItems\BeadCabochonForm\Enums;

enum BeadCabochonFormNamesEnum: string
{
    case BRIOLETTE_CABOCHON = 'бриолет кабошон';
    case ELLIPSOID_CABOCHON = 'элkипсоид кабошон';
    case RONDEL_CABOCHON    = 'рондель кабошон';
    case SPHERE_CABOCHON  = 'шар кабошон';
    case BAROQUE_CABOCHON = 'барокко кабошон';

    public function description(): string
    {
        return match ($this) {
            self::BRIOLETTE_CABOCHON => 'бусина кабошон в форме груши или капли без граней',
            self::ELLIPSOID_CABOCHON => 'бусина элkипсоидной формы без граней',
            self::RONDEL_CABOCHON    => 'бусина в форме приплюснутой сферы без граней',
            self::SPHERE_CABOCHON    => 'бусина в форме гладкого (без граней) шара',
            self::BAROQUE_CABOCHON   => 'бусины нестандартной формы данной от природы'
        };
    }
}
