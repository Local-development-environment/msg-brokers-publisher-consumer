<?php

namespace Domain\Stones\JewelleryOrnamentalGrades\Enums;

enum JewelleryOrnamentalGradeBuilderEnum: string
{
    case FIRST_GRADE  = 'ювелирно-поделочная группа первый порядок';
    case SECOND_GRADE = 'ювелирно-поделочная группа второй порядок';

    public function description(): string
    {
        return match ($this) {
            self::FIRST_GRADE  => 'камни ювелирно-поделочной группы первого порядка по классификации проф. Мельникова Е.П.',
            self::SECOND_GRADE => 'камни ювелирно-поделочной группы второго порядка по классификации проф. Мельникова Е.П.',
        };
    }
}
