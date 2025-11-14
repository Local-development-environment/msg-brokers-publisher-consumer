<?php

declare(strict_types=1);

namespace Domain\Coverings\CoveringShades\Enums;

enum CoveringShadeEnum: string
{
    case TYPE_RESOURCE = 'coveringShades';
    case TABLE_NAME    = 'jw_coverings.covering_shades';
    case PRIMARY_KEY   = 'id';
}
