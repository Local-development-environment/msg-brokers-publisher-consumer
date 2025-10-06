<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\BraceletSizes\Enums;

enum BraceletSizeEnum: string
{
    case TYPE_RESOURCE = 'braceletSizes';
    case TABLE_NAME = 'jw_properties.bracelet_sizes';
    case PRIMARY_KEY   = 'id';
}
