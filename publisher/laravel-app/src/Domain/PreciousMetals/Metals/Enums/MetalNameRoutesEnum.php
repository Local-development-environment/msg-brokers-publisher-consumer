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
    case RELATED_TO_METAL_DETAILS         = 'metal.metal-details';
    case RELATIONSHIP_TO_INSERT_EXTERIORS = 'metal.relationships.metal-details';
    case RELATED_TO_HALLMARKS             = 'metals.hallmarks';
    case RELATIONSHIP_TO_HALLMARKS        = 'metals.relationships.hallmarks';
    case RELATED_TO_COLOURS               = 'metals.colours';
    case RELATIONSHIP_TO_COLOURS          = 'metals.relationships.colours';
}
