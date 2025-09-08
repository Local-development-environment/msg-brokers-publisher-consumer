<?php

namespace Domain\Inserts\Stones\Enums;

enum StoneEnum: string
{
    case TYPE_RESOURCE = 'stones';
    case TABLE_NAME    = 'jw_inserts.stones';
    case PRIMARY_KEY   = 'jw_inserts.stones.id';
}
