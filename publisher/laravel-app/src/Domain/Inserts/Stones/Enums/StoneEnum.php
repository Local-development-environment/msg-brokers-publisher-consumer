<?php

namespace Domain\Inserts\Stones\Enums;

enum StoneEnum: string
{
    case RESOURCE = 'stones';
    case TABLE    = 'jw_inserts.stones';
    case PRIMARY_KEY   = 'jw_inserts.stones.id';
    case FK_TYPE_ORIGIN   = 'jw_inserts.stones.type_origin_id';
}
