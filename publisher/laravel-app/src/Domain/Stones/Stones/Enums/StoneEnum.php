<?php

namespace Domain\Stones\Stones\Enums;

enum StoneEnum: string
{
    case TYPE_RESOURCE = 'stones';
    case TABLE_NAME    = 'jw_stones.stones';
    case PRIMARY_KEY   = 'id';
    case FK_TYPE_ORIGIN   = 'type_origin_id';
    case FK_STONE_COLOUR   = 'stone_colour_id';
}
