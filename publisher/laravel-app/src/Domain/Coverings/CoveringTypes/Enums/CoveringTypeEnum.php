<?php

declare(strict_types=1);

namespace Domain\Coverings\CoveringTypes\Enums;

enum CoveringTypeEnum: string
{
    case TYPE_RESOURCE = 'coveringTypes';
    case TABLE_NAME    = 'jw_coverings.covering_types';
    case PRIMARY_KEY   = 'id';
}
