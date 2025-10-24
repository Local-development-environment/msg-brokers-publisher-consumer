<?php

namespace Domain\Inserts\StoneColours\Enums;

enum StoneColourEnum: string
{
    case TYPE_RESOURCE = 'stoneColours';
    case TABLE_NAME    = 'jw_inserts.colours';
    case PRIMARY_KEY   = 'id';
}
