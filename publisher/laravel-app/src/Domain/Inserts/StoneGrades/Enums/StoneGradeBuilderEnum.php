<?php

declare(strict_types=1);

namespace Domain\Inserts\StoneGrades\Enums;

enum StoneGradeBuilderEnum: string
{
    case FIRST_GRADE  = 'первый порядок';
    case SECOND_GRADE = 'второй порядок';
    case THIRD_GRADE  = 'третий порядок';
    case FORTH_GRADE  = 'четвертый порядок';

    public function description(): string
    {
        return match($this) {
            self::FIRST_GRADE => 'Ювелирные и ювелирно-поделочные камни бывают первого порядка в пределах своей группы',
            self::SECOND_GRADE => 'Ювелирные и ювелирно-поделочные камни бывают второго порядка в пределах своей группы',
            self::THIRD_GRADE  => 'Ювелирные камни бывают третьего порядка в пределах своей группы',
            self::FORTH_GRADE  => 'Ювелирные камни бывают четвертого порядка в пределах своей группы',
        };
    }
}
