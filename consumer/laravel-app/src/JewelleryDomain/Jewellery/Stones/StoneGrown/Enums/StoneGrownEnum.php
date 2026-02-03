<?php

namespace JewelleryDomain\Jewellery\Stones\StoneGrown\Enums;

enum StoneGrownEnum: string
{
    case TYPE_RESOURCE = 'stoneGrowns';
    case TABLE_NAME    = 'jw_stones.stone_growns';
    case PRIMARY_KEY   = 'id';
}
