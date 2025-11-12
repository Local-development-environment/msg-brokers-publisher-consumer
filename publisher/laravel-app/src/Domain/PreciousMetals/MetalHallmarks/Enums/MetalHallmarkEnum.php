<?php

declare(strict_types=1);

namespace Domain\PreciousMetals\MetalHallmarks\Enums;

enum MetalHallmarkEnum: string
{
    case TYPE_RESOURCE = 'metalHallmarks';
    case TABLE_NAME    = 'jw_metals.metal_hallmarks';
    case PRIMARY_KEY   = 'id';
}
