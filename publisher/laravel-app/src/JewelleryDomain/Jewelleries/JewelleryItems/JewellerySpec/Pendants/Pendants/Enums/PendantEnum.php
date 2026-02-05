<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Pendants\Pendants\Enums;

enum PendantEnum: string
{
    case TYPE_RESOURCE = 'pendants';
    case TABLE_NAME    = 'jw_properties.pendants';
    case PRIMARY_KEY   = 'id';
}
