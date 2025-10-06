<?php

declare(strict_types=1);

namespace Domain\Jewelleries\Jewelleries\Enums;

enum JewelleryEnum: string
{
    case TYPE_RESOURCE = 'jewelleries';
    case TABLE_NAME    = 'jewelleries.jewelleries';
    case PRIMARY_KEY   = 'jewelleries.jewelleries.id';
}
