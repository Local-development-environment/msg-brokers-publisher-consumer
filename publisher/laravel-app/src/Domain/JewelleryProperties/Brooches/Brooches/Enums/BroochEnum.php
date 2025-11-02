<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Brooches\Brooches\Enums;

enum BroochEnum: string
{
    case TYPE_RESOURCE = 'brooches';
    case TABLE_NAME    = 'jw_properties.brooches';
    case PRIMARY_KEY   = 'id';
}
