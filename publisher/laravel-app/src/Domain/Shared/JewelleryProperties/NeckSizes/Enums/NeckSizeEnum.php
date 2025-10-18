<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\NeckSizes\Enums;

enum NeckSizeEnum: string
{
    case TYPE_RESOURCE = 'neckSizes';
    case TABLE_NAME = 'jw_properties.neck_sizes';
    case PRIMARY_KEY   = 'id';
}
