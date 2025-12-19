<?php

declare(strict_types=1);

namespace Domain\PreciousMetals\PreciousMetals\Enums;

enum PreciousMetalEnum: string
{
    case TYPE_RESOURCE = 'preciousMetals';
    case TABLE_NAME    = 'jw_metals.precious_metals';
    case PRIMARY_KEY   = 'id';
}
