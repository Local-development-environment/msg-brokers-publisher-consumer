<?php

namespace Domain\Stones\JewelleryGrades\Enums;

enum JewelleryGradeEnum: string
{
    case TYPE_RESOURCE = 'jwlyGrades';
    case TABLE_NAME    = 'jw_stones.jwly_grades';
    case PRIMARY_KEY   = 'id';
}
