<?php

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletGroups\Enums;

enum BraceletGroupEnum: string
{
    case TYPE_RESOURCE    = 'braceletGroups';
    case TABLE_NAME       = 'jw_properties.bracelet_groups';
    case PRIMARY_KEY      = 'id';
}
