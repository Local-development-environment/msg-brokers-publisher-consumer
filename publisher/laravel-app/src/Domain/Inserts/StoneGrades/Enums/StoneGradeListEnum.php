<?php

declare(strict_types=1);

namespace Domain\Inserts\StoneGrades\Enums;

enum StoneGradeListEnum: string
{
    case JEWELLERY_FIRST             = 'ювелирный камень первого порядка';
    case JEWELLERY_SECOND            = 'ювелирный камень второго порядка';
    case JEWELLERY_THIRD             = 'ювелирный камень третьего порядка';
    case JEWELLERY_FORTH             = 'ювелирный камень четвертого порядка';
    case JEWELLERY_ORNAMENTAL_FIRST  = 'ювелирно-поделочный камень первого порядка';
    case JEWELLERY_ORNAMENTAL_SECOND = 'ювелирно-поделочный камень второго порядка';

    public function description(): string
    {
        return match($this) {
            self::JEWELLERY_FIRST, self::JEWELLERY_SECOND, self::JEWELLERY_THIRD, self::JEWELLERY_FORTH =>
            'Градация для группы "ювелирные камни"',
            self::JEWELLERY_ORNAMENTAL_FIRST, self::JEWELLERY_ORNAMENTAL_SECOND =>
            'Градация для группы "ювелирно-поделочные камни"',
        };
    }
}
