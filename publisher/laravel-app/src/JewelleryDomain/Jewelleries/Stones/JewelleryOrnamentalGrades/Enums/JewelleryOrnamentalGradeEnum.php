<?php

namespace JewelleryDomain\Jewelleries\Stones\JewelleryOrnamentalGrades\Enums;

enum JewelleryOrnamentalGradeEnum: string
{
    case TYPE_RESOURCE = 'jwlyOrnamGrades';
    case TABLE_NAME    = 'jw_stones.jwly_ornam_grades';
    case PRIMARY_KEY   = 'id';
}
