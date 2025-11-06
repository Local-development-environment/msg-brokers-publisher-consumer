<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\BaseWeavings\Enums;

enum BaseWeavingEnum: string
{
    case TYPE_RESOURCE = 'baseWeaving';
    case TABLE_NAME = 'jw_properties.base_weavings';
    case PRIMARY_KEY   = 'id';
}
