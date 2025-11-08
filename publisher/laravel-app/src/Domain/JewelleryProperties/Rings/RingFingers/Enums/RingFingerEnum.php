<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Rings\RingFingers\Enums;

enum RingFingerEnum: string
{
    case TYPE_RESOURCE = 'ringFingers';
    case TABLE_NAME    = 'jw_properties.ring_fingers';
    case PRIMARY_KEY   = 'id';
}
