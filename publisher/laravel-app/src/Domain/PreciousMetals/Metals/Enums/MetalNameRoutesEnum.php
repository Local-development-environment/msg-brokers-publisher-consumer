<?php

declare(strict_types=1);

namespace Domain\PreciousMetals\Metals\Enums;

enum MetalNameRoutesEnum: string
{
    case CRUD_INDEX              = 'metals.index';
    case CRUD_SHOW               = 'metals.show';
    case CRUD_POST               = 'metals.post';
    case CRUD_PATCH              = 'metals.patch';
    case CRUD_DELETE             = 'metals.delete';
    case RELATED_TO_METAL_HALLMARK      = 'metals.metal-hallmark';
    case RELATIONSHIP_TO_METAL_HALLMARK = 'metals.relationships.metal-hallmark';
    case RELATED_TO_METAL_COLOUR        = 'metals.metal-color';
    case RELATIONSHIP_TO_COLOUR         = 'metals.relationships.colour';
    case RELATED_TO_JEWELLERY           = 'metals.jewellery';
    case RELATIONSHIP_TO_JEWELLERY      = 'metals.relationships.jewellery';
}
