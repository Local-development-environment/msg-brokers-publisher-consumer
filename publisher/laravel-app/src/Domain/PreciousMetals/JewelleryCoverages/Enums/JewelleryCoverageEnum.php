<?php

declare(strict_types=1);

namespace Domain\PreciousMetals\JewelleryCoverages\Enums;

enum JewelleryCoverageEnum: string
{
    case TYPE_RESOURCE = 'jewelleryCoverages';
    case TABLE_NAME    = 'jw_metals.jewellery_coverages';
    case PRIMARY_KEY   = 'id';
    case FK_COVERAGE = 'coverage_id';
    case FK_JEWELLERY  = 'jewellery_id';
}
