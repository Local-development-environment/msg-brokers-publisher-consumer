<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Rings\Rings\Enums;

enum RingNameRoutesEnum: string
{
    case CRUD_INDEX                   = 'rings.index';
    case CRUD_SHOW                    = 'rings.show';
    case CRUD_POST                    = 'rings.post';
    case CRUD_PATCH                   = 'rings.patch';
    case CRUD_DELETE                  = 'rings.delete';
    case RELATED_TO_JEWELLERY         = 'ring.jewellery';
    case RELATIONSHIP_TO_JEWELLERY    = 'ring.relationships.jewellery';
    case RELATED_TO_RING_METRICS      = 'ring.ring-metrics';
    case RELATIONSHIP_TO_RING_METRICS = 'ring.relationships.ring-metrics';
    case RELATED_TO_RING_DETAILS      = 'ring.ring-details';
    case RELATIONSHIP_TO_RING_DETAILS = 'ring.relationships.ring-details';
    case RELATED_TO_RING_SIZES        = 'rings.ring-sizes';
    case RELATIONSHIP_TO_RING_SIZES   = 'rings.relationships.ring-sizes';
    case RELATED_TO_RING_TYPES        = 'rings.ring-types';
    case RELATIONSHIP_TO_RING_TYPES   = 'rings.relationships.ring-types';
}
