<?php

namespace JewelleryDomain\Jewelleries\Stones\StoneNaturalFamilies\Enums;

enum StoneNaturalFamilyEnum: string
{
    case TYPE_RESOURCE = 'stoneNaturalFamilies';
    case TABLE_NAME    = 'jw_stones.stone_natural_families';
    case PRIMARY_KEY   = 'id';
    case FK_STONE_FAMILY = 'jw_stones.stone_family_id';
}
