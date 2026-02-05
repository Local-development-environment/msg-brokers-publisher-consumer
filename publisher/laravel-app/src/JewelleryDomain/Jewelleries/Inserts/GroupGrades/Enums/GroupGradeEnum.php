<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\GroupGrades\Enums;

enum GroupGradeEnum: string
{
    case TYPE_RESOURCE      = 'groupGrades';
    case TABLE_NAME         = 'jw_inserts.group_grades';
    case PRIMARY_KEY        = 'id';
    case FK_STONE_GROUP_ID  = 'stone_group_id';
}
