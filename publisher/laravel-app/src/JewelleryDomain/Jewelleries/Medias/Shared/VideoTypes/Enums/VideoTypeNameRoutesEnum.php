<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Medias\Shared\VideoTypes\Enums;

enum VideoTypeNameRoutesEnum: string
{
    case CRUD_INDEX   = 'video-types.index';
    case CRUD_SHOW    = 'video-types.show';
    case CRUD_POST    = 'video-types.post';
    case CRUD_PATCH   = 'video-types.patch';
    case CRUD_DELETE  = 'video-types.delete';

    case RELATED_TO_CATALOG_VIDEO_DETAILS      = 'video-type.catalog-video-details';
    case RELATIONSHIP_TO_CATALOG_VIDEO_DETAILS = 'video-type.relationships.catalog-video-details';
    case RELATED_TO_REVIEW_VIDEO_DETAILS      = 'video-type.review-video-details';
    case RELATIONSHIP_TO_REVIEW_VIDEO_DETAILS = 'video-type.relationships.review-video-details';
}
