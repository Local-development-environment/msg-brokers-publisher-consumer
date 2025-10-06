<?php

namespace Domain\Inserts\StoneGroups\Enums;

enum StoneGroupEnum: string
{
    case TYPE_RESOURCE = 'stoneGroups';
    case TABLE_NAME    = 'jw_inserts.stone_groups';
    case PRIMARY_KEY   = 'id';
}
