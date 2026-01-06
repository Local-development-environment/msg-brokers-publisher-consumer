<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\Weavings\Enums;

enum WeavingEnum: string
{
    case TYPE_RESOURCE   = 'weavings';
    case TABLE_NAME      = 'jw_properties.weavings';
    case PRIMARY_KEY     = 'id';
    case FK_BASE_WEAVING = 'base_weaving_id';
}
