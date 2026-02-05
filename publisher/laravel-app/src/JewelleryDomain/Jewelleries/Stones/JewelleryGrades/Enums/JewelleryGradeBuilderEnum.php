<?php

namespace JewelleryDomain\Jewelleries\Stones\JewelleryGrades\Enums;

enum JewelleryGradeBuilderEnum: string
{
    case FIRST_GRADE  = 'ювелирная группа первый порядок';
    case SECOND_GRADE = 'ювелирная группа второй порядок';
    case THIRD_GRADE  = 'ювелирная группа третий порядок';
    case FORTH_GRADE  = 'ювелирная группа четвертый порядок';

    public function description(): string
    {
        return match ($this) {
            self::FIRST_GRADE  => 'камни ювелирной группы первого порядка по классификации проф. Мельникова Е.П.',
            self::SECOND_GRADE => 'камни ювелирной группы второго порядка по классификации проф. Мельникова Е.П.',
            self::THIRD_GRADE  => 'камни ювелирной группы третьего порядка по классификации проф. Мельникова Е.П.',
            self::FORTH_GRADE  => 'камни ювелирной группы четвертого порядка по классификации проф. Мельникова Е.П.'
        };
    }
}
