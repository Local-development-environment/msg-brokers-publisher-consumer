<?php

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingDetails\Enums;

enum RingDetailNameRoutesEnum: string
{
    case CRUD_INDEX                = 'ring-details.index';
    case CRUD_SHOW                 = 'ring-details.show';
    case CRUD_POST                 = 'ring-details.post';
    case CRUD_PATCH                = 'ring-details.patch';
    case CRUD_DELETE               = 'ring-details.delete';
    case RELATED_TO_RING_TYPE      = 'ring-details.ring-type';
    case RELATIONSHIP_TO_RING_TYPE = 'ring-details.relationships.ring-type';
    case RELATED_TO_RING           = 'ring-details.ring';
    case RELATIONSHIP_TO_RING      = 'ring-details.relationships.ring';
}
