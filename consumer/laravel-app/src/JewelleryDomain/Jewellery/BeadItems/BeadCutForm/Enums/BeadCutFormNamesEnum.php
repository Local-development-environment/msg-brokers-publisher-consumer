<?php

namespace JewelleryDomain\Jewellery\BeadItems\BeadCutForm\Enums;

enum BeadCutFormNamesEnum: string
{
    case RONDEL_CUT    = 'рондель';
    case BICONE_CUT    = 'биконус';
    case XILION_CUT    = 'ксилион';
    case BRIOLETTE_CUT = 'бриолет';
    case BAROQUE_CUT   = 'барокко';
    case CUBE_CUT      = 'кубическая';
    case ELLIPSOID_CUT = 'эллипсоид';
    case PYRAMID_CUT   = 'пирамида';
    case SPHERE_CUT    = 'шар';

    public function description(): string
    {
        return match ($this) {
            self::RONDEL_CUT    => 'сплюснутая сфера или диск. отверстие проходит по короткому диаметру',
            self::BICONE_CUT    => 'Два конуса, имеющие общее основание',
            self::XILION_CUT    => 'Ксилион применяется к бусинам-биконусам, делая их более блестящими, чем при стандартной огранке.',
            self::BRIOLETTE_CUT => 'каплевидная бусина с огранкой часто подвешиваемая за узкую часть',
            self::BAROQUE_CUT   => 'барочные огранки часто имеют более крупные и ассиметричные грани из-за природной формы',
            self::CUBE_CUT      => 'четкая форма куба с дополнительными гранями',
            self::ELLIPSOID_CUT => 'эллипсоид форма с дополнительными гранями',
            self::PYRAMID_CUT   => 'бусина в форме пирамиды с дополнительными гранями',
            self::SPHERE_CUT    => 'бусина в форме шара с дополнительными гранями',
        };
    }
}
