<?php

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Brooches\BroochTypes\Enums;

enum BroochTypeEnum: string
{
    case TYPE_RESOURCE = 'broochTypes';
    case TABLE_NAME    = 'jw_properties.brooch_types';
    case PRIMARY_KEY   = 'id';
}
