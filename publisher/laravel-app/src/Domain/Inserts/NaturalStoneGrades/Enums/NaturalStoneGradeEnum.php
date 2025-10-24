<?php
declare(strict_types=1);

namespace Domain\Inserts\NaturalStoneGrades\Enums;

enum NaturalStoneGradeEnum: string
{
    case TYPE_RESOURCE      = 'naturalStoneGrades';
    case TABLE_NAME         = 'jw_inserts.natural_stone_grade';
    case PRIMARY_KEY        = 'id';
    case FK_STONE_GRADE_ID  = 'stone_grade_id';
}
