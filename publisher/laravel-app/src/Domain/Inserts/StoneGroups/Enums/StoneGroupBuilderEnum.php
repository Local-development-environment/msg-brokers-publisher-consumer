<?php

declare(strict_types=1);

namespace Domain\Inserts\StoneGroups\Enums;

use Domain\Inserts\StoneGrades\Enums\StoneGradeBuilderEnum;
use Domain\Inserts\StoneGrades\Enums\StoneGradeEnum;

enum StoneGroupBuilderEnum: string
{
    case PRECIOUS             = 'природный';
    case JEWELLERIES          = 'имитация';
    case JEWELLERY_ORNAMENTAL = 'ювелирно-поделочные';
    case ORNAMENTAL           = 'поделочные';

    public function description(): string
    {
        return match ($this) {
            self::PRECIOUS             => 'Драгоценными камнями в России официально являются алмазы, рубины, изумруды, сапфиры, александриты и природный жемчуг',
            self::JEWELLERIES          => 'Вторая по ценности группа камней следующая после драгоценных. Внутри группы камни подразделяются на четыре порядка',
            self::JEWELLERY_ORNAMENTAL => 'Третья по ценности группа камней следующая после драгоценных и ювелирных. Внутри группы камни подразделяются на два порядка',
            self::ORNAMENTAL           => 'Четвертая и последняя по ценности группа камней без разделения на порядки',
        };
    }

    public function grades(): array
    {
        return match ($this) {
            self::PRECIOUS,
            self::ORNAMENTAL => [],
            self::JEWELLERIES          => [
                StoneGradeBuilderEnum::FIRST_GRADE->value,
                StoneGradeBuilderEnum::SECOND_GRADE->value,
                StoneGradeBuilderEnum::THIRD_GRADE->value,
                StoneGradeBuilderEnum::FORTH_GRADE->value,
            ],
            self::JEWELLERY_ORNAMENTAL => [
                StoneGradeBuilderEnum::FIRST_GRADE->value,
                StoneGradeBuilderEnum::SECOND_GRADE->value,
            ],
        };
    }
}
