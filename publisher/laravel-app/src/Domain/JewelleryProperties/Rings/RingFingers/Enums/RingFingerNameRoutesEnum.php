<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Rings\RingFingers\Enums;

enum RingFingerNameRoutesEnum: string
{
    case CRUD_INDEX            = 'ring-fingers.index';
    case CRUD_SHOW             = 'ring-fingers.show';
    case CRUD_POST             = 'ring-fingers.post';
    case CRUD_PATCH            = 'ring-fingers.patch';
    case CRUD_DELETE           = 'ring-fingers.delete';
    case RELATED_TO_RINGS      = 'ring-finger.rings';
    case RELATIONSHIP_TO_RINGS = 'ring-finger.relationships.rings';
}
