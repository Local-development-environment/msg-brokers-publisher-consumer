<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletSpecifics\Enums;

enum BraceletSpecificEnum: string
{
    case TYPE_RESOURCE    = 'braceletSpecifics';
    case TABLE_NAME       = 'jw_properties.bracelet_specifics';
    case PRIMARY_KEY      = 'id';
}
