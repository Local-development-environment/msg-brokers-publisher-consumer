<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Medias\ReviewMedias\ReviewVideos\Enums;

enum ReviewVideoNameRoutesEnum: string
{
    case CRUD_INDEX  = 'review-videos.index';
    case CRUD_SHOW   = 'review-videos.show';
    case CRUD_POST   = 'review-videos.post';
    case CRUD_PATCH  = 'review-videos.patch';
    case CRUD_DELETE = 'review-videos.delete';

    case RELATED_TO_REVIEW_MEDIA              = 'review-video.review-media';
    case RELATIONSHIP_TO_REVIEW_MEDIA         = 'review-video.relationships.review-media';
    case RELATED_TO_REVIEW_VIDEO_DETAILS      = 'review-video.review-video-details';
    case RELATIONSHIP_TO_REVIEW_VIDEO_DETAILS = 'review-video.relationships.review-video-details';
}
