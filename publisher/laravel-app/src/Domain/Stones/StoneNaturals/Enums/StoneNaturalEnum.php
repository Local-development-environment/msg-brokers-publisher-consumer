<?php

namespace Domain\Stones\StoneNaturals\Enums;

enum StoneNaturalEnum: string
{
    case TYPE_RESOURCE = 'stoneNaturals';
    case TABLE_NAME    = 'jw_stones.stone_naturals';
    case PRIMARY_KEY   = 'id';
}
