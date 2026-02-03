<?php

namespace JewelleryDomain\Jewellery\Stones\StoneJewelleryGrade\Enums;

enum StoneJewelleryGradeEnum: string
{
    case TYPE_RESOURCE = 'stoneJewelleryGrades';
    case TABLE_NAME    = 'jw_stones.stone_jwly_grades';
    case PRIMARY_KEY   = 'id';
    case FK_JWLY_GRADE   = 'jwly_grade_id';
}
