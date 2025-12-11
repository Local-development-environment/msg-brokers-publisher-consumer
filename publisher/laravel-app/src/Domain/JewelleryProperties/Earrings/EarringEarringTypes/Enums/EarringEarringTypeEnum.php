<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Earrings\EarringEarringTypes\Enums;

enum EarringEarringTypeEnum: string
{
    case TYPE_RESOURCE = 'earringEarringTypes';
    case TABLE_NAME    = 'jw_properties.earring_earring_type';
    case PRIMARY_KEY   = 'id';
}
