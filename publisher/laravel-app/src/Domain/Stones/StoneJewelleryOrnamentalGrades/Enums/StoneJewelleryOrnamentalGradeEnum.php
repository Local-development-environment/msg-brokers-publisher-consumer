<?php

namespace Domain\Stones\StoneJewelleryOrnamentalGrades\Enums;

enum StoneJewelleryOrnamentalGradeEnum: string
{
    case TYPE_RESOURCE = 'stoneJewelleryOrnamentalGrades';
    case TABLE_NAME    = 'jw_stones.stone_jwly_ornam_grades';
    case PRIMARY_KEY   = 'id';
    case FK_JWLY_ORNAM_GRADE   = 'jwly_ornam_grade_id';
}
