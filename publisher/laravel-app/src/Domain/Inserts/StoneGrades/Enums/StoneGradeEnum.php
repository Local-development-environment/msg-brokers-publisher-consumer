<?php

namespace Domain\Inserts\StoneGrades\Enums;

enum StoneGradeEnum: string
{
    case TYPE_RESOURCE = 'stoneGrades';
    case TABLE_NAME    = 'jw_inserts.stone_grades';
    case PRIMARY_KEY   = 'id';
}
