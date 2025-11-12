<?php

declare(strict_types=1);

namespace Domain\PreciousMetals\MetalTypes\Enums;

enum MetalTypeEnum: string
{
    case TYPE_RESOURCE = 'metalTypes';
    case TABLE_NAME    = 'jw_metals.metal_types';
    case PRIMARY_KEY   = 'id';
}
