<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletWeavings\Enums;

enum BraceletWeavingEnum: string
{
    case TYPE_RESOURCE = 'braceletWeavings';
    case TABLE_NAME    = 'jw_properties.bracelet_weavings';
    case PRIMARY_KEY   = 'id';
    case FK_BRACELET   = 'bracelet_id';
    case FK_WEAVING    = 'weaving_id';
}
