<?php

declare(strict_types=1);

namespace Domain\Coverings\CoveringFunctions\Enums;

enum CoveringFunctionEnum: string
{
    case TYPE_RESOURCE = 'coveringFunctions';
    case TABLE_NAME    = 'jw_coverings.covering_functions';
    case PRIMARY_KEY   = 'id';
}
