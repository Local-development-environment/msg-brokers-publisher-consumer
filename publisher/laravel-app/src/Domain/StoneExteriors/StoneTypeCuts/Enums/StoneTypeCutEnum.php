<?php

namespace Domain\StoneExteriors\StoneTypeCuts\Enums;

enum StoneTypeCutEnum: string
{
    case TYPE_RESOURCE = 'stoneTypeCuts';
    case TABLE_NAME    = 'jw_stone_exteriors.stone_type_cuts';
    case PRIMARY_KEY   = 'id';
}
