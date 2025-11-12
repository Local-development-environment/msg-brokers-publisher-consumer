<?php

declare(strict_types=1);

namespace Domain\PreciousMetals\MetalTypes\Enums;

enum MetalTypeNameRoutesEnum: string
{
    case CRUD_INDEX              = 'metal_types.index';
    case CRUD_SHOW               = 'metal_types.show';
    case CRUD_POST               = 'metal_types.post';
    case CRUD_PATCH              = 'metal_types.patch';
    case CRUD_DELETE             = 'metal_types.delete';
    case RELATED_TO_METAL_HALLMARKS      = 'metal_type.metal-hallmarks';
    case RELATIONSHIP_TO_METAL_HALLMARKS = 'metal_type.relationships.metal-hallmarks';
    case RELATED_TO_HALLMARKS          = 'metal_types.hallmarks';
    case RELATIONSHIP_TO_HALLMARKS     = 'metal_types.relationships.hallmarks';
}
