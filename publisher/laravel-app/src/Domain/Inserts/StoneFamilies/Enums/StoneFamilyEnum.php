<?php

namespace Domain\Inserts\StoneFamilies\Enums;

enum StoneFamilyEnum: string
{
    case RESOURCE = 'stoneFamilies';
    case TABLE    = 'jw_inserts.stone_families';
    case PRIMARY_KEY   = 'jw_inserts.stone_families.id';
}
