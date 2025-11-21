<?php

declare(strict_types=1);

namespace Domain\PreciousMetals\MetalHallmarks\Enums;

enum MetalHallmarkEnum: string
{
    case TYPE_RESOURCE = 'metalHallmarks';
    case TABLE_NAME    = 'jw_metals.metal_hallmarks';
    case PRIMARY_KEY   = 'id';
    case FK_HALLMARK_ID = 'hallmark_id';
    case FK_METAL_TYPE_ID = 'metal_type_id';
}
