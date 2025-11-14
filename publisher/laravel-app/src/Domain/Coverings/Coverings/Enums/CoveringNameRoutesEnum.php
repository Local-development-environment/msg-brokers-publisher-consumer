<?php

declare(strict_types=1);

namespace Domain\Coverings\Coverings\Enums;

enum CoveringNameRoutesEnum: string
{
    case CRUD_INDEX              = 'coverings.index';
    case CRUD_SHOW               = 'coverings.show';
    case CRUD_POST               = 'coverings.post';
    case CRUD_PATCH              = 'coverings.patch';
    case CRUD_DELETE             = 'coverings.delete';
    case RELATED_TO_JEWELLERY           = 'coverings.jewellery';
    case RELATIONSHIP_TO_JEWELLERY      = 'coverings.relationships.jewellery';
    case RELATED_TO_COVERING_SHADE      = 'coverings.covering-shade';
    case RELATIONSHIP_TO_COVERING_SHADE = 'coverings.relationships.covering-shade';
    case RELATED_TO_COVERING_TYPE       = 'coverings.covering-type';
    case RELATIONSHIP_TO_COVERING_TYPE  = 'coverings.relationships.covering-type';
}
