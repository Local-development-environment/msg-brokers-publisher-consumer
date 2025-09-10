<?php

namespace Domain\Inserts\StoneGroups\Enums;

enum StoneGroupEnum: string
{
    case RESOURCE = 'stoneGroups';
    case TABLE    = 'jw_inserts.stone_groups';
    case PRIMARY_KEY   = 'id';
}
