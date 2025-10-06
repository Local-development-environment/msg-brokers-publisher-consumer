<?php

namespace Domain\Inserts\StoneFamilies\Enums;

enum StoneFamilyEnum: string
{
    case TYPE_RESOURCE = 'stoneFamilies';
    case TABLE_NAME    = 'jw_inserts.stone_families';
    case PRIMARY_KEY   = 'jw_inserts.stone_families.id';
}
