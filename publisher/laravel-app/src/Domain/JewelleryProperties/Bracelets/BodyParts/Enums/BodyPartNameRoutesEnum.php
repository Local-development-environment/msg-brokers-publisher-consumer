<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\BodyParts\Enums;

enum BodyPartNameRoutesEnum: string
{
    case CRUD_INDEX  = 'body-parts.index';
    case CRUD_SHOW   = 'body-parts.show';
    case CRUD_POST   = 'body-parts.post';
    case CRUD_PATCH  = 'body-parts.patch';
    case CRUD_DELETE = 'body-parts.delete';


    case RELATED_TO_CLASPS              = 'body-parts.clasps';
    case RELATIONSHIP_TO_CLASPS         = 'body-parts.relationships.clasps';
    case RELATED_TO_BRACELET_BASES      = 'body-parts.bracelet-bases';
    case RELATIONSHIP_TO_BRACELET_BASES = 'body-parts.relationships.bracelet-bases';
    case RELATED_TO_BRACELETS           = 'body-part.bracelets';
    case RELATIONSHIP_TO_BRACELETS      = 'body-part.relationships.bracelets';
}
