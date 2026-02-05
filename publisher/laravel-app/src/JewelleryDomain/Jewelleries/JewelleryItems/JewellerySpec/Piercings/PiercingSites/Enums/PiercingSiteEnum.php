<?php

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Piercings\PiercingSites\Enums;

enum PiercingSiteEnum: string
{
    case TYPE_RESOURCE = 'piercingSites';
    case TABLE_NAME    = 'jw_properties.piercing_sites';
    case PRIMARY_KEY   = 'id';
}
