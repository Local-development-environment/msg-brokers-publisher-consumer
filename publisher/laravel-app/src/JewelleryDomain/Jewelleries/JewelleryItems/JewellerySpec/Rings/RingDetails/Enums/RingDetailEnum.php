<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingDetails\Enums;

enum RingDetailEnum: string
{
    case TYPE_RESOURCE = 'ringDetails';
    case TABLE_NAME    = 'jw_properties.ring_details';
    case PRIMARY_KEY   = 'id';
}
