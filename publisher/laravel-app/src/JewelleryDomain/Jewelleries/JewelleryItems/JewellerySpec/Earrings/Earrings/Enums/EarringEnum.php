<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Earrings\Earrings\Enums;

enum EarringEnum: string
{
    case TYPE_RESOURCE = 'earrings';
    case TABLE_NAME    = 'jw_properties.earrings';
    case PRIMARY_KEY   = 'id';
}
