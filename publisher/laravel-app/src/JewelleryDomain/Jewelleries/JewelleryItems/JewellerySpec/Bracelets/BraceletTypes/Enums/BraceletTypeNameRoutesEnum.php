<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletTypes\Enums;

enum BraceletTypeNameRoutesEnum: string
{
    case CRUD_INDEX  = 'bracelet-types.index';
    case CRUD_SHOW   = 'bracelet-types.show';
    case CRUD_POST   = 'bracelet-types.post';
    case CRUD_PATCH  = 'bracelet-types.patch';
    case CRUD_DELETE = 'bracelet-types.delete';


    case RELATED_TO_CLASPS          = 'bracelet-types.clasps';
    case RELATIONSHIP_TO_CLASPS     = 'bracelet-types.relationships.clasps';
    case RELATED_TO_BODY_PARTS      = 'bracelet-types.body-parts';
    case RELATIONSHIP_TO_BODY_PARTS = 'bracelet-types.relationships.body-parts';
    case RELATED_TO_BRACELETS       = 'bracelet-type.bracelets';
    case RELATIONSHIP_TO_BRACELETS  = 'bracelet-type.relationships.bracelets';
}
