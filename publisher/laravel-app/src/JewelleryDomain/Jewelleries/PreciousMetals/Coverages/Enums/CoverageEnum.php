<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\PreciousMetals\Coverages\Enums;

enum CoverageEnum: string
{
    case TYPE_RESOURCE = 'coverages';
    case TABLE_NAME    = 'jw_metals.coverages';
    case PRIMARY_KEY   = 'id';
}
