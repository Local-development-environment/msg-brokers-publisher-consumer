<?php

namespace Domain\Stones\StoneFamilies\Enums;

enum StoneFamilyEnum: string
{
    case TYPE_RESOURCE = 'stoneFamilies';
    case TABLE_NAME    = 'jw_stones.stone_families';
    case PRIMARY_KEY   = 'id';
}
