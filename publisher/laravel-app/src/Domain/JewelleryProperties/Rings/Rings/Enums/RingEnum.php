<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Rings\Rings\Enums;

enum RingEnum: string
{
    case TYPE_RESOURCE = 'rings';
    case TABLE_NAME    = 'jw_properties.rings';
    case PRIMARY_KEY   = 'id';
}
