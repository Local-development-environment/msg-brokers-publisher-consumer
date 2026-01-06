<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\BraceletBases\Enums;

enum BraceletBaseNameRoutesEnum: string
{
    case CRUD_INDEX  = 'bracelet-bases.index';
    case CRUD_SHOW   = 'bracelet-bases.show';
    case CRUD_POST   = 'bracelet-bases.post';
    case CRUD_PATCH  = 'bracelet-bases.patch';
    case CRUD_DELETE = 'bracelet-bases.delete';


    case RELATED_TO_CLASPS              = 'bracelet-bases.clasps';
    case RELATIONSHIP_TO_CLASPS         = 'bracelet-bases.relationships.clasps';
    case RELATED_TO_BODY_PARTS      = 'bracelet-bases.body-parts';
    case RELATIONSHIP_TO_BODY_PARTS = 'bracelet-bases.relationships.body-parts';
    case RELATED_TO_BRACELETS           = 'bracelet-base.bracelets';
    case RELATIONSHIP_TO_BRACELETS      = 'bracelet-base.relationships.bracelets';
}
