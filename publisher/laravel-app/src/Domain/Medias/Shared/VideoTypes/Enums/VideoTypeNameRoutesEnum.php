<?php

declare(strict_types=1);

namespace Domain\Medias\Shared\VideoTypes\Enums;

enum VideoTypeNameRoutesEnum: string
{
    case CRUD_INDEX   = 'video-types.index';
    case CRUD_SHOW    = 'video-types.show';
    case CRUD_POST    = 'video-types.post';
    case CRUD_PATCH   = 'video-types.patch';
    case CRUD_DELETE  = 'video-types.delete';

    case RELATED_TO_VIDEO_DETAILS      = 'video-type.video-details';
    case RELATIONSHIP_TO_VIDEO_DETAILS = 'video-type.relationships.video-details';
}
