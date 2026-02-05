<?php

namespace JewelleryDomain\Jewelleries\Inserts\InsertOptionalInfos\Enums;

enum InsertOptionalInfoNameRoutesEnum: string
{
    case CRUD_INDEX              = 'insert-optional-infos.index';
    case CRUD_SHOW               = 'insert-optional-infos.show';
    case CRUD_POST               = 'insert-optional-infos.post';
    case CRUD_PATCH              = 'insert-optional-infos.patch';
    case CRUD_DELETE             = 'insert-optional-infos.delete';
    case RELATED_TO_INSERT        = 'insert-optional-info.insert';
    case RELATIONSHIP_TO_INSERT   = 'insert-optional-info.relationships.insert';
}
