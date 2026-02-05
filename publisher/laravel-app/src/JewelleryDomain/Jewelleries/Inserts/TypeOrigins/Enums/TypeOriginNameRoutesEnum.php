<?php

namespace JewelleryDomain\Jewelleries\Inserts\TypeOrigins\Enums;

enum TypeOriginNameRoutesEnum: string
{
    case CRUD_INDEX               = 'stone-type-origin.index';
    case CRUD_SHOW                = 'stone-type-origin.show';
    case CRUD_POST                = 'stone-type-origin.post';
    case CRUD_PATCH               = 'stone-type-origin.patch';
    case CRUD_DELETE              = 'stone-type-origin.delete';
    case RELATED_TO_STONES        = 'stone-type-origin.stones';
    case RELATIONSHIP_TO_STONES   = 'stone-type-origin.relationships.stones';
}
