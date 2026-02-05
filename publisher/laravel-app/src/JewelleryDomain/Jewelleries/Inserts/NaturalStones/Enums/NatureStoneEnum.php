<?php

namespace JewelleryDomain\Jewelleries\Inserts\NaturalStones\Enums;

enum NatureStoneEnum: string
{
    case TYPE_RESOURCE   = 'naturalStones';
    case TABLE_NAME      = 'jw_inserts.natural_stones';
    case PRIMARY_KEY     = 'id';
    case FK_STONE_GROUP  = 'stone_group_id';
    case FK_STONE_FAMILY = 'stone_family_id';
}
