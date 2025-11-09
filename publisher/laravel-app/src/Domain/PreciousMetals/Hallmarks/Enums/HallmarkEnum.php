<?php

declare(strict_types=1);

namespace Domain\PreciousMetals\Hallmarks\Enums;

enum HallmarkEnum: string
{
    case TYPE_RESOURCE = 'hallmarks';
    case TABLE_NAME    = 'jw_metals.hallmarks';
    case PRIMARY_KEY   = 'id';
}
