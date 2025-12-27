<?php

declare(strict_types=1);

namespace Domain\Medias\ReviewMedias\ReviewVideoDetails\Enums;

enum ReviewVideoDetailNameRoutesEnum: string
{
    case CRUD_INDEX  = 'review-video-details.index';
    case CRUD_SHOW   = 'review-video-details.show';
    case CRUD_POST   = 'review-video-details.post';
    case CRUD_PATCH  = 'review-video-details.patch';
    case CRUD_DELETE = 'review-video-details.delete';

    case RELATED_TO_REVIEW_VIDEO      = 'review-video-details.review-video';
    case RELATIONSHIP_TO_REVIEW_VIDEO = 'review-video-details.relationships.review-video';
    case RELATED_TO_VIDEO_TYPE         = 'review-video-details.video-type';
    case RELATIONSHIP_TO_VIDEO_TYPE    = 'review-video-details.relationships.video-type';
}
