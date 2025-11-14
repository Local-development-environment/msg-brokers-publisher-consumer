<?php

declare(strict_types=1);

namespace Domain\Coverings\CoveringTypes\Enums;

enum CoveringTypeNameRoutesEnum: string
{
    case CRUD_INDEX  = 'covering-types.index';
    case CRUD_SHOW   = 'covering-types.show';
    case CRUD_POST   = 'covering-types.post';
    case CRUD_PATCH  = 'covering-types.patch';
    case CRUD_DELETE = 'covering-types.delete';
    case RELATED_TO_COVERINGS              = 'covering-type.coverings';
    case RELATIONSHIP_TO_COVERINGS         = 'covering-type.relationships.coverings';
    case RELATED_TO_COVERING_FUNCTION      = 'covering-types.covering-function';
    case RELATIONSHIP_TO_COVERING_FUNCTION = 'covering-types.relationships.covering-function';
    case RELATED_TO_COVERING_SHADES        = 'covering-types.covering-shades';
    case RELATIONSHIP_TO_COVERING_SHADES   = 'covering-types.relationships.covering-shades';
}
