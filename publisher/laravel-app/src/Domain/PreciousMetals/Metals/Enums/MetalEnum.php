<?php

declare(strict_types=1);

namespace Domain\PreciousMetals\Metals\Enums;

enum MetalEnum: string
{
    case TYPE_RESOURCE = 'metals';
    case TABLE_NAME    = 'jw_metals.metals';
    case PRIMARY_KEY   = 'id';
}
