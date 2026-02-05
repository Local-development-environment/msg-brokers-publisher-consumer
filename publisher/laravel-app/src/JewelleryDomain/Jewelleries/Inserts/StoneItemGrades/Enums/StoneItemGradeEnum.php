<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\StoneItemGrades\Enums;

enum StoneItemGradeEnum: string
{
    case TYPE_RESOURCE    = 'stoneItemGrades';
    case TABLE_NAME       = 'jw_inserts.stone_item_grades';
    case PRIMARY_KEY      = 'id';
    case FK_STONE_GRADE   = 'stone_grade_id';
}
