<?php

declare(strict_types=1);

namespace Domain\Medias\MediaVideos\Videos\Enums;

enum VideoNameRoutesEnum: string
{
    case CRUD_INDEX              = 'videos.index';
    case CRUD_SHOW               = 'videos.show';
    case CRUD_POST               = 'videos.post';
    case CRUD_PATCH              = 'videos.patch';
    case CRUD_DELETE             = 'videos.delete';

    case RELATED_TO_JEWELLERY      = 'videos.jewellery';
    case RELATIONSHIP_TO_JEWELLERY = 'videos.relationships.jewellery';
    case RELATED_TO_PRODUCER       = 'videos.producer';
    case RELATIONSHIP_TO_PRODUCER  = 'videos.relationships.producer';
    case RELATED_TO_VIDEO_DETAILS      = 'video.video-details';
    case RELATIONSHIP_TO_VIDEO_DETAILS = 'video.relationships.video-details';
}
