<?php

namespace Domain\BeadItems\BeadCutForms\Enums;

enum BeadCutFormBuilderEnum: string
{
    case RONDEL      = 'рондель';
    case BICONE      = 'биконус';
    case XILION      = 'ксилион';
    case BRIOLETTE   = 'бриолет';
    case BAROQUE     = 'барокко';
    case CUBE        = 'кубическая';
    case OVAL_CUT    = 'овал';
    case PYRAMID     = 'Пирамида';
    case SPHERE      = 'шар';

    public function description(): string
    {
        return match ($this) {
            self::RONDEL      => 'сплюснутая сфера или диск. отверстие проходит по короткому диаметру',
            self::BICONE      => 'Два конуса, имеющие общее основание',
            self::XILION      => 'Ксилион применяется к бусинам-биконусам, делая их более блестящими, чем при стандартной огранке.',
            self::BRIOLETTE   => 'каплевидная бусина с огранкой часто подвешиваемая за узкую часть',
            self::BAROQUE     => 'барочные огранки часто имеют более крупные и ассиметричные грани',
            self::CUBE        => 'четкая форма куба с дополнительными гранями',
            self::OVAL_CUT    => 'овальная форма с дополнительными гранями',
            self::PYRAMID     => 'бусина в форме пирамиды с дополнительными гранями',
            self::SPHERE      => 'бусина в форме шара с дополнительными гранями',
        };
    }
}
