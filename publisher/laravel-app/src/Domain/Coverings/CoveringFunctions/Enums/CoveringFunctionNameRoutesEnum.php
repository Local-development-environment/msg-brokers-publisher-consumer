<?php

declare(strict_types=1);

namespace Domain\Coverings\CoveringFunctions\Enums;

enum CoveringFunctionNameRoutesEnum: string
{
    case CRUD_INDEX  = 'covering-functions.index';
    case CRUD_SHOW   = 'covering-functions.show';
    case CRUD_POST   = 'covering-functions.post';
    case CRUD_PATCH  = 'covering-functions.patch';
    case CRUD_DELETE = 'covering-functions.delete';
    case RELATED_TO_COVERING_TYPES      = 'coverings.covering-types';
    case RELATIONSHIP_TO_COVERING_TYPES = 'coverings.relationships.covering-types';
}
