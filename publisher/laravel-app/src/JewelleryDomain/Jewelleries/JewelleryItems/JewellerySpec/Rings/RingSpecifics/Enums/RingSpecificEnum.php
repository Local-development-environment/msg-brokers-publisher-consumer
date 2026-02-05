<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingSpecifics\Enums;

enum RingSpecificEnum: string
{
    case TYPE_RESOURCE = 'ringSpecifics';
    case TABLE_NAME    = 'jw_properties.ring_specifics';
    case PRIMARY_KEY   = 'id';
}
