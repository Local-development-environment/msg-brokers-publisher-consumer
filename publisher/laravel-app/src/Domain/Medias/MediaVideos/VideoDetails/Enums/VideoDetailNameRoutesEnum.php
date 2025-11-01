<?php

declare(strict_types=1);

namespace Domain\Medias\MediaVideos\VideoDetails\Enums;

enum VideoDetailNameRoutesEnum: string
{
    case CRUD_INDEX              = 'video-details.index';
    case CRUD_SHOW               = 'video-details.show';
    case CRUD_POST               = 'video-details.post';
    case CRUD_PATCH              = 'video-details.patch';
    case CRUD_DELETE             = 'video-details.delete';

    case RELATED_TO_VIDEO           = 'video-details.video';
    case RELATIONSHIP_TO_VIDEO      = 'video-details.relationships.video';
    case RELATED_TO_VIDEO_TYPE      = 'video-details.video-type';
    case RELATIONSHIP_TO_VIDEO_TYPE = 'video-details.relationships.video-type';
}
