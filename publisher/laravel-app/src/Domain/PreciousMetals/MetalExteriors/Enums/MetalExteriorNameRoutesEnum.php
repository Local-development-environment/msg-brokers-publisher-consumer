<?php

declare(strict_types=1);

namespace Domain\PreciousMetals\MetalExteriors\Enums;

enum MetalExteriorNameRoutesEnum: string
{
    case CRUD_INDEX              = 'metal-exteriors.index';
    case CRUD_SHOW               = 'metal-exteriors.show';
    case CRUD_POST               = 'metal-exteriors.post';
    case CRUD_PATCH              = 'metal-exteriors.patch';
    case CRUD_DELETE             = 'metal-exteriors.delete';
    case RELATED_TO_HALLMARK        = 'metal-exteriors.hallmark';
    case RELATIONSHIP_TO_HALLMARK   = 'metal-exteriors.relationships.hallmark';
    case RELATED_TO_METAL_TYPE      = 'metal-exteriors.metal-type';
    case RELATIONSHIP_TO_METAL_TYPE = 'metal-exteriors.relationships.metal-type';
    case RELATED_TO_JEWELLERY       = 'metal-exteriors.jewellery';
    case RELATIONSHIP_TO_JEWELLERY  = 'metal-exteriors.relationships.jewellery';
}
