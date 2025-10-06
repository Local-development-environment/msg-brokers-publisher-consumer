<?php

namespace Domain\Inserts\NaturalStoneGrades\Enums;

enum NaturalStoneGradeEnum: string
{
    case TYPE_RESOURCE = 'naturalStoneGrades';
    case TABLE_NAME = 'jw_inserts.natural_stone_grade';
    case PRIMARY_KEY   = 'id';
    case FK_NATURAL_STONE     = 'natural_stone_id';
    case FK_STONE_GRADE     = 'stone_grade_id';
}
