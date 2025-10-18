<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Necklaces\Necklaces\Enums;

enum NecklaceEnum: string
{
    case TYPE_RESOURCE = 'necklaces';
    case TABLE_NAME    = 'jw_properties.necklaces';
    case PRIMARY_KEY   = 'id';
    case FK_CLASP      = 'clasp_id';
}
