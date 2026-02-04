<?php

namespace Domain\Stones\StoneGroups\Enums;

enum StoneGroupEnum: string
{
    case TYPE_RESOURCE = 'stoneGroups';
    case TABLE_NAME    = 'jw_stones.stone_groups';
    case PRIMARY_KEY   = 'id';
}
