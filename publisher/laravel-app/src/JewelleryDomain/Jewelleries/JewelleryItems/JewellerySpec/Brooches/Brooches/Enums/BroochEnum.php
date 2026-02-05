<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Brooches\Brooches\Enums;

enum BroochEnum: string
{
    case TYPE_RESOURCE = 'brooches';
    case TABLE_NAME    = 'jw_properties.brooches';
    case PRIMARY_KEY   = 'id';
}
