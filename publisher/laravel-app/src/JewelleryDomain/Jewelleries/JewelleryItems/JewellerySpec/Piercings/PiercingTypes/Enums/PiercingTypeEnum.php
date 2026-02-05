<?php

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Piercings\PiercingTypes\Enums;

enum PiercingTypeEnum: string
{
    case TYPE_RESOURCE = 'piercingTypes';
    case TABLE_NAME    = 'jw_properties.piercing_types';
    case PRIMARY_KEY   = 'id';
}
