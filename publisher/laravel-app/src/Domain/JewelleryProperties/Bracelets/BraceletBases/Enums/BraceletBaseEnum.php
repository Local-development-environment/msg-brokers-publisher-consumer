<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\BraceletBases\Enums;

enum BraceletBaseEnum: string
{
    case TYPE_RESOURCE = 'braceletBases';
    case TABLE_NAME = 'jw_properties.bracelet_bases';
    case PRIMARY_KEY   = 'id';
}
