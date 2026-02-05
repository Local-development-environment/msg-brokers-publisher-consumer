<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingTypes\Enums;

enum RingTypeEnum: string
{
    case TYPE_RESOURCE = 'ringTypes';
    case TABLE_NAME    = 'jw_properties.ring_types';
    case PRIMARY_KEY   = 'id';
}
