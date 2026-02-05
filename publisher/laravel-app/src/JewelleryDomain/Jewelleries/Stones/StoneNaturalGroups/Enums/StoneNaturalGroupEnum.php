<?php

namespace JewelleryDomain\Jewelleries\Stones\StoneNaturalGroups\Enums;

enum StoneNaturalGroupEnum: string
{
    case TYPE_RESOURCE = 'stoneNaturalGroups';
    case TABLE_NAME    = 'jw_stones.stone_natural_groups';
    case PRIMARY_KEY   = 'id';
    case FK_STONE_GROUP   = 'stone_group_id';
}
