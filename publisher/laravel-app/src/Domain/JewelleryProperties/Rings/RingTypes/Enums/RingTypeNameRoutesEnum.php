<?php
declare(strict_types=1);

namespace Domain\JewelleryProperties\Rings\RingTypes\Enums;

enum RingTypeNameRoutesEnum: string
{
    case CRUD_INDEX                   = 'ring-types.index';
    case CRUD_SHOW                    = 'ring-types.show';
    case CRUD_POST                    = 'ring-types.post';
    case CRUD_PATCH                   = 'ring-types.patch';
    case CRUD_DELETE                  = 'ring-types.delete';
    case RELATED_TO_RING_DETAILS      = 'ring-type.ring-details';
    case RELATIONSHIP_TO_RING_DETAILS = 'ring-type.relationships.ring-details';
    case RELATED_TO_RINGS             = 'ring-types.rings';
    case RELATIONSHIP_TO_RINGS        = 'ring-types.relationships.rings';
}
