<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Medias\ReviewMedias\ReviewMedias\Enums;

enum ReviewMediaNameRoutesEnum: string
{
    case CRUD_INDEX  = 'review-medias.index';
    case CRUD_SHOW   = 'review-medias.show';
    case CRUD_POST   = 'review-medias.post';
    case CRUD_PATCH  = 'review-medias.patch';
    case CRUD_DELETE = 'review-medias.delete';

    case RELATED_TO_JEWELLERY      = 'review-medias.jewellery';
    case RELATIONSHIP_TO_JEWELLERY = 'review-medias.relationships.jewellery';
    case RELATED_TO_MEDIA_TYPE      = 'review-medias.media-type';
    case RELATIONSHIP_TO_MEDIA_TYPE = 'review-medias.relationships.media-type';
    case RELATED_TO_REVIEW_VIDEO      = 'review-medias.review-video';
    case RELATIONSHIP_TO_REVIEW_VIDEO = 'review-medias.relationships.review-video';
    case RELATED_TO_REVIEW_PICTURE      = 'review-medias.review-picture';
    case RELATIONSHIP_TO_REVIEW_PICTURE = 'review-medias.relationships.review-picture';
}
