<?php

namespace JewelleryDomain\Jewelleries\Stones\StoneColours\Enums;

enum StoneColourEnum: string
{
    case TYPE_RESOURCE = 'stoneColours';
    case TABLE_NAME    = 'jw_stones.stone_colours';
    case PRIMARY_KEY   = 'id';
}
