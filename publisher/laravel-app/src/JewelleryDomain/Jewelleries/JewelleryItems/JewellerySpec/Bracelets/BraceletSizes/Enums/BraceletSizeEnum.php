<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletSizes\Enums;

enum BraceletSizeEnum: string
{
    case TYPE_RESOURCE = 'braceletSizes';
    case TABLE_NAME = 'jw_properties.bracelet_sizes';
    case PRIMARY_KEY   = 'id';
}
