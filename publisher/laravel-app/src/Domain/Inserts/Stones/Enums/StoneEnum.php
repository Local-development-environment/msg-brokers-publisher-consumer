<?php

namespace Domain\Inserts\Stones\Enums;

enum StoneEnum: string
{
    case TYPE_RESOURCE    = 'stones';
    case TABLE_NAME       = 'jw_inserts.stones';
    case PRIMARY_KEY      = 'id';
    case FK_TYPE_ORIGIN   = 'type_origin_id';
}
