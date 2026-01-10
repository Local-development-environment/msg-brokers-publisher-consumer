<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Rings\RingSizes\Enums;

enum RingSizeNameRoutesEnum: string
{
    case CRUD_INDEX                   = 'ring-sizes.index';
    case CRUD_SHOW                    = 'ring-sizes.show';
    case CRUD_POST                    = 'ring-sizes.post';
    case CRUD_PATCH                   = 'ring-sizes.patch';
    case CRUD_DELETE                  = 'ring-sizes.delete';
    case RELATED_TO_RING_METRICS      = 'ring-size.ring-metrics';
    case RELATIONSHIP_TO_RING_METRICS = 'ring-size.relationships.ring-metrics';
    case RELATED_TO_RINGS             = 'ring-sizes.rings';
    case RELATIONSHIP_TO_RINGS        = 'ring-sizes.relationships.rings';
}
