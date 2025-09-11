<?php

namespace Domain\Inserts\OptionalInfos\Enums;

enum OptionalInfoNameRoutesEnum: string
{
    case CRUD_INDEX              = 'optional-infos.index';
    case CRUD_SHOW               = 'optional-infos.show';
    case CRUD_POST               = 'optional-infos.post';
    case CRUD_PATCH              = 'optional-infos.patch';
    case CRUD_DELETE             = 'optional-infos.delete';
    case RELATED_TO_INSERT        = 'optional-info.insert';
    case RELATIONSHIP_TO_INSERT   = 'optional-info.relationships.insert';
}
