<?php

namespace Domain\PreciousMetals\CoverageTypes\Enums;

enum CoverageTypeEnum: string
{
    case TYPE_RESOURCE = 'coverageTypes';
    case TABLE_NAME    = 'jw_metals.coverage_types';
    case PRIMARY_KEY   = 'id';
}
