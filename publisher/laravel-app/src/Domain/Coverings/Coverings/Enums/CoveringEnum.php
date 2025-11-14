<?php

declare(strict_types=1);

namespace Domain\Coverings\Coverings\Enums;

enum CoveringEnum: string
{
    case TYPE_RESOURCE = 'coverings';
    case TABLE_NAME    = 'jw_coverings.coverings';
    case PRIMARY_KEY   = 'id';
    case FK_JEWELLERY      = 'jewellery_id';
    case FK_COVERING_TYPE  = 'covering_type_id';
    case FK_COVERING_SHADE = 'covering_shade_id';
}
