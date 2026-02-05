<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\PreciousMetals\JewelleryMetals\Enums;

enum JewelleryMetalEnum: string
{
    case TYPE_RESOURCE = 'jewelleryMetals';
    case TABLE_NAME    = 'jw_metals.jewellery_metals';
    case PRIMARY_KEY   = 'id';
    case FK_HALLMARK_ID = 'hallmark_id';
    case FK_JEWELLERY_ID = 'jewellery_id';
    case FK_METAL_TYPE_ID = 'precious_metal_id';
}
