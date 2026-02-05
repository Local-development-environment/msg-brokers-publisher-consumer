<?php

namespace JewelleryDomain\Jewelleries\Stones\StoneGrowns\Enums;

enum StoneGrownEnum: string
{
    case TYPE_RESOURCE = 'stoneGrowns';
    case TABLE_NAME    = 'jw_stones.stone_growns';
    case PRIMARY_KEY   = 'id';
}
