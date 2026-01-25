<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\BraceletTypes\Enums;

enum BraceletTypeEnum: string
{
    case TYPE_RESOURCE = 'braceletTypes';
    case TABLE_NAME = 'jw_properties.bracelet_types';
    case PRIMARY_KEY   = 'id';
}
