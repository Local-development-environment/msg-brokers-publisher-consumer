<?php

namespace Domain\Inserts\StoneGrades\Enums;

enum StoneGradeEnum: string
{
    case RESOURCE = 'stoneGrades';
    case TABLE = 'jw_inserts.stone_grades';
    case PRIMARY_KEY   = 'id';
}
