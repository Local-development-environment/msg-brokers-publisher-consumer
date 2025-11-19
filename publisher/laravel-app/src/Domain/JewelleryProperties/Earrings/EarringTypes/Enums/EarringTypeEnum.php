<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Earrings\EarringTypes\Enums;

enum EarringTypeEnum: string
{
    case TYPE_RESOURCE = 'EarringTypes';
    case TABLE_NAME    = 'jw_properties.earring_types';
    case PRIMARY_KEY   = 'id';
}
