<?php

declare(strict_types=1);

namespace Domain\PreciousMetals\GoldenColours\Enums;

enum GoldenColourEnum: string
{
    case TYPE_RESOURCE = 'goldenColours';
    case TABLE_NAME    = 'jw_metals.golden_colours';
    case PRIMARY_KEY   = 'id';
}
