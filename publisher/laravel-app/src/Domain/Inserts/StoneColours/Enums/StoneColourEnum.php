<?php

namespace Domain\Inserts\StoneColours\Enums;

enum StoneColourEnum: string
{
    case RESOURCE     = 'stoneColours';
    case TABLE        = 'jw_inserts.colours';
    case PRIMARY_KEY  = 'id';
}
