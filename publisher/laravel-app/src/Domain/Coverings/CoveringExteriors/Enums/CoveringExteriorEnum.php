<?php

declare(strict_types=1);

namespace Domain\Coverings\CoveringExteriors\Enums;

enum CoveringExteriorEnum: string
{
    case TYPE_RESOURCE = 'coveringExteriors';
    case TABLE_NAME    = 'jw_coverings.covering_exteriors';
    case PRIMARY_KEY   = 'id';
}
