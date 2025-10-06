<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\LengthNames\Enums;

enum LengthNameEnum: string
{
    case TYPE_RESOURCE = 'lengthNames';
    case TABLE_NAME = 'jw_properties.length_names';
    case PRIMARY_KEY   = 'id';
}
