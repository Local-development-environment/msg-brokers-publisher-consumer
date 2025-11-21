<?php

declare(strict_types=1);

namespace Domain\PreciousMetals\MetalExteriors\Enums;

enum MetalExteriorEnum: string
{
    case TYPE_RESOURCE = 'metals';
    case TABLE_NAME    = 'jw_metals.metal_exteriors';
    case PRIMARY_KEY   = 'id';
    case FK_HALLMARK         = 'hallmark_id';
    case FK_METAL_METAL_TYPE = 'metal_type_id';
    case FK_JEWELLERY        = 'jewellery_id';
}
