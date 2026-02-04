<?php

namespace JewelleryDomain\Jewellery\Stones\StoneNatural\Enums;

enum StoneNaturalEnum: string
{
    case TYPE_RESOURCE = 'stoneNaturals';
    case TABLE_NAME    = 'jw_stones.stone_naturals';
    case PRIMARY_KEY   = 'id';
}
