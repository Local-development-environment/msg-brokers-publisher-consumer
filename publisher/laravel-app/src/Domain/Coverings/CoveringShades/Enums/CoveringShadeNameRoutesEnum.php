<?php

declare(strict_types=1);

namespace Domain\Coverings\CoveringShades\Enums;

enum CoveringShadeNameRoutesEnum: string
{
    case CRUD_INDEX  = 'covering-shades.index';
    case CRUD_SHOW   = 'covering-shades.show';
    case CRUD_POST   = 'covering-shades.post';
    case CRUD_PATCH  = 'covering-shades.patch';
    case CRUD_DELETE = 'covering-shades.delete';
    case RELATED_TO_COVERINGS           = 'covering-shade.coverings';
    case RELATIONSHIP_TO_COVERINGS      = 'covering-shade.relationships.coverings';
}
