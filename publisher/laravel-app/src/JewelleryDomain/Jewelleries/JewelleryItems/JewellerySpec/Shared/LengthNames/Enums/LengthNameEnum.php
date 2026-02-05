<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\LengthNames\Enums;

enum LengthNameEnum: string
{
    case TYPE_RESOURCE = 'lengthNames';
    case TABLE_NAME = 'jw_properties.length_names';
    case PRIMARY_KEY   = 'id';
}
