<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Rings\RingSizes\Enums;

enum RingSizeEnum: string
{
    case TYPE_RESOURCE = 'ringSizes';
    case TABLE_NAME    = 'jw_properties.ring_sizes';
    case PRIMARY_KEY   = 'id';
}
